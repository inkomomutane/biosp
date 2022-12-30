<?php

namespace Tests\Feature\Http\Controllers\Admin\UserController;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('config:clear');
        $this->seed(RolesAndPermissionsSeeder::class);
        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
        User::factory()->create();
        $this->user = User::first();
        $this->user->assignRole('super-admin');
    }

    /**
     * @group routing
     */
    public function test_is_super_admin_able_to_access_user_edit_route_with_200()
    {
        $response = $this->actingAs($this->user)->get(route('user.edit'));
        $response->assertOk();
    }

    /**
     * @group routing
     */
    public function test_is_admin_accessing_user_edit_route_forbidden_with_403()
    {
        $this->user->syncRoles(['admin']);
        $response = $this->actingAs($this->user)->get(route('user.edit'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_admin_accessing_user_edit_route_forbidden_with_403()
    {
        $this->user->syncRoles(['aops-admin']);
        $response = $this->actingAs($this->user)->get(route('user.edit'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_accessing_user_edit_route_forbidden_with_403()
    {
        $this->user->syncRoles(['aosp']);
        $response = $this->actingAs($this->user)->get(route('user.edit'));
        $response->assertForbidden();
    }

    /**
     * @group views
     */
    public function test_is_user_edit_view_showing_all_params_to_user_be_update()
    {
        User::factory()->create();
        $this->user = User::first();
        $this->user->assignRole('super-admin');
        $user = User::factory()->create();

        $response = $this->actingAs($this->user)->get(route('user.edit', [
            'user' => $user->uuid,
        ]));

        // $response->assertOk();
        // dd($response->content());
        $response->assertViewIs('pages.backend.users.create_edit');
        //
        $response->assertSee(__('Full name'));
        $response->assertSee(__('Email Address'));
        $response->assertDontSeeText(__('Password'));
        $response->assertDontSeeText(__('Confirm Password'));
        $response->assertSee('value="' .$user->name . ' "',false);
        $response->assertSee('value="' .$user->email . ' "',false);
        $response->assertSee(__('Edit user'));
        $response->assertSee(__('Update user'));
        $response->assertViewHas('user',$user);
    }
}
