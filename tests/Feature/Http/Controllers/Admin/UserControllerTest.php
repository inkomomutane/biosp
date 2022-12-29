<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('config:clear');
        $this->seed(RolesAndPermissionsSeeder::class);
        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    /**
     * @group routing
     */
    public function test_is_super_admin_able_to_access_user_index_route_with_200()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(200);
    }

    /**
     * @group routing
     */
    public function test_is_admin_accessing_user_index_route_forbidden_with_403()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_admin_accessing_user_index_route_forbidden_with_403()
    {
        $user = User::factory()->create();
        $user->assignRole('aops-admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_accessing_user_index_route_forbidden_with_403()
    {
        $user = User::factory()->create();
        $user->assignRole('aosp');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertForbidden();
    }

     /**
      * @group views
      */
     public function test_user_index_cable_to_show_all_users()
     {
         $user = (User::factory(45)->create())->first();
         $user->assignRole('super-admin');
         $response = $this->actingAs($user)->get(route('user.index'));
         $response->assertViewIs('pages.backend.users.index');
         $response->assertSee($user->name);
         $response->assertSee($user->email);
         $response->assertSee(__(Str::upper($user->roles()->first()->name)));
         $response->assertSee(__('WITHOUT ROLES'));
         $response->assertViewHas('users');
     }
}
