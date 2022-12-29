<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
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

    public function test_can_super_admin_get_user_index_route()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(200);
    }

    public function test_is_admin_get_user_index_route_forbidden_403()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(403);
    }

    public function test_is_aosp_admin_get_user_index_route_forbidden_403()
    {
        $user = User::factory()->create();
        $user->assignRole('aops-admin');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(403);
    }

    public function test_is_aosp_get_user_index_route_forbidden_403()
    {
        $user = User::factory()->create();
        $user->assignRole('aosp');
        $response = $this->actingAs($user)->get(route('user.index'));
        $response->assertStatus(403);
    }




}
