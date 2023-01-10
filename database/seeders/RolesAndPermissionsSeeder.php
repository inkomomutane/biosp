<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfRolesNames = ['super-admin', 'admin', 'aosp-admin', 'aosp'];
        $permissions = collect($arrayOfRolesNames)->map(function ($role) {
            return ['name' => $role, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()];
        });

        Role::insert($permissions->toArray());
    }
}
