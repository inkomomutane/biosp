<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function login(User $user = null, String|array $role = null):self
    {
        $user ??= User::factory()->create();
        if($role) $user->syncRoles($role);
        return $this->actingAs($user);
    }

     function baseConfig():void
    {
        $this->artisan('config:clear');
        $this->seed(RolesAndPermissionsSeeder::class);
        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

}
