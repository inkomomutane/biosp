<?php

namespace Tests\Feature\Http\Controllers\Admin\UserController;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends TestCase
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
    public function test_is_super_admin_able_to_access_user_create_route_with_200()
    {
        $response = $this->actingAs($this->user)->get(route('user.create'));
        $response->assertOk();
    }

    /**
     * @group routing
     */
    public function test_is_admin_accessing_user_create_route_forbidden_with_403()
    {
        $this->user->syncRoles(['admin']);
        $response = $this->actingAs($this->user)->get(route('user.create'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_admin_accessing_user_index_create_forbidden_with_403()
    {
        $this->user->syncRoles(['aops-admin']);
        $response = $this->actingAs($this->user)->get(route('user.create'));
        $response->assertForbidden();
    }

    /**
     * @group routing
     */
    public function test_is_aosp_accessing_user_create_route_forbidden_with_403()
    {
        $this->user->syncRoles(['aosp']);
        $response = $this->actingAs($this->user)->get(route('user.create'));
        $response->assertForbidden();
    }

    /**
     * @group views
     */
    public function test_is_user_create_view_showing_all_params_to_create_new_user()
    {
        $response = $this->actingAs($this->user)->get(route('user.create'));
        $response->assertViewIs('pages.backend.users.create_edit');
        $response->assertSee(__('Full name'));
        $response->assertSee(__('Email'));
        $response->assertSee(__('Password'));
        $response->assertSee(__('Password confirmation'));
        $response->assertSee(__('Create user'));
        $response->assertSee(__('Store user'));
    }
}
