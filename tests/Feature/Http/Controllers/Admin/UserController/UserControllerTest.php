<?php

namespace Tests\Feature\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker;

    private User $user;


    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->user = User::factory()->create();
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->get(route('user.index'))->assertSuccessful();
            else
                $this->login(role: $role)->get(route('user.index'))->assertForbidden();
        }
    }

     /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->get(route('user.create'))->assertSuccessful();
            else
                $this->login(role: $role)->get(route('user.create'))->assertForbidden();
        }
    }

     /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_store_route_with_302()
    {

        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->post(route('user.store'))->assertRedirect();
            else
                $this->login(role: $role)->post(route('user.store'))->assertForbidden();
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_show_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->get(route('user.show',$this->user))->assertSuccessful();
            else
                $this->login(role: $role)->get(route('user.show',$this->user))->assertForbidden();
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->get(route('user.edit',$this->user))->assertSuccessful();
            else
                $this->login(role: $role)->get(route('user.edit',$this->user))->assertForbidden();
        }
    }

     /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->put(route('user.update',$this->user))->assertRedirect();
            else
                $this->login(role: $role)->put(route('user.update',$this->user))->assertForbidden();
        }
    }


     /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin'){
                $user = User::factory()->create();
                $this->login(role: $role)->delete(route('user.destroy',$user))->assertRedirect();
            }
            else{
                $user = User::factory()->create();
                $this->login(role: $role)->delete(route('user.destroy',$this->user))->assertForbidden();
            }

        }
    }

     /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_grant_role_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if($role == 'super-admin')
                $this->login(role: $role)->post(route('user.grant_role',$this->user),['role' => '1'])->assertRedirect();
            else
                $this->login(role: $role)->post(route('user.grant_role',$this->user),['role' => '1'])->assertForbidden();
        }
    }

     /**
      * @group views
      */
     public function test_is_user_index_view_showing_all_users()
     {
         [$user] = User::factory()->count(10)->create();

         $response = $this->login(role: 'super-admin')->get(action([UserController::class,'index']));

         $response->assertViewIs('pages.backend.users.index');
         $response->assertSee($user->name);
         $response->assertSee($user->email);
         $response->assertSee(__('WITHOUT ROLES'));
         $response->assertViewHas('users');
     }


    /**
     * @group views
     */
    public function test_is_user_create_view_showing_all_params_to_create_new_user()
    {
        $response = $this->login(role:'super-admin')->get(route('user.create'));
        $response->assertViewIs('pages.backend.users.create_edit');
        $response->assertSee(__('Full name'));
        $response->assertSee(__('Email Address'));
        $response->assertSee(__('Password'));
        $response->assertSee(__('Confirm Password'));
        $response->assertSee(__('Create user'));
        $response->assertSee(__('Store user'));
    }

    /**
     * @group views
     */
    public function test_is_user_show_view_showing_the_correct_user()
    {
        $response = $this->login(role:'super-admin')->get(route('user.show',[
            'user' => $this->user
        ]));
        $response->assertViewIs('pages.backend.users.show');
        $response->assertViewHas('user',$this->user);
        $response->assertSee(__('Full name'));
        $response->assertSee(__('Email Address'));
        $response->assertSee($this->user->name);
        $response->assertSee($this->user->email);
        $response->assertSee($this->user->roles()?->first()?->name);
    }


    /**
     * @group views
     */
    public function test_is_store_user_route_success_with_only_valid_data_request()
    {

        // $this->withExceptionHandling();

        $userCreate = [
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->userName(),
        ];
        $response = $this->login(role:'super-admin')->post(route('user.store', array_merge([
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $userCreate)));

        $response->assertRedirectToRoute('user.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('users', $userCreate);
    }


     /**
     * @group views
     */
    public function test_is_user_edit_view_showing_all_params_to_user_be_update()
    {

        $response = $this->login(role:'super-admin')->get(route('user.edit', [
            'user' => $this->user->uuid,
        ]));

        $response->assertViewIs('pages.backend.users.create_edit');
        $response->assertSee(__('Full name'));
        $response->assertSee(__('Email Address'));
        $response->assertDontSeeText(__('Password'));
        $response->assertDontSeeText(__('Confirm Password'));
        $response->assertSee('value="' .$this->user->name . ' "',false);
        $response->assertSee('value="' .$this->user->email . ' "',false);
        $response->assertSee(__('Edit user'));
        $response->assertSee(__('Update user'));
        $response->assertViewHas('user',$this->user);
    }

    public function test_is_update_user_route_success_with_only_valid_data_request()
    {
        // $this->withExceptionHandling();
        $userUpdate = [
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->userName(),
        ];
        $response = $this->login(role:'super-admin')
        ->patch(route('user.update',[
            'user' => $this->user->uuid,
        ]),$userUpdate);
        // dd($response);
        $response->assertStatus(302);
        $response->assertRedirectToRoute('user.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('users', $userUpdate);

    }


    public function test_is_super_admin_able_to_delete_user_()
    {
        $user  = clone $this->user;
        $response = $this->login(role:'super-admin')
        ->delete(route('user.update',[
            'user' => $this->user->uuid,
        ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('user.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('users',[
            'name'  => $user->name,
            'email' => $user->email,
            'uuid'  => $user->uuid
        ]);

    }


    public function test_is_super_admin_able_to_change_user_role()
    {
        $role = Role::first();

        $response = $this->login(role: 'super-admin')
        ->post(route('user.grant_role',[
            'user' => $this->user->uuid
        ]),[
            'role' => $role->id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('user.show',[
            'user' => $this->user->uuid
        ]);
        $this->assertEquals(true,$this->user->hasRole($role));

    }

}
