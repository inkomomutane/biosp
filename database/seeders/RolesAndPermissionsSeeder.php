<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


        $arrayOfRolesNames = ['super-admin', 'admin','aops-admin','aosp'];
        $permissions = collect($arrayOfRolesNames)->map(function ($role) {
            return ['name' => $role, 'guard_name' => 'web' ,'created_at' => now(),'updated_at' => now() ];
        });

        Role::insert($permissions->toArray());

        // Role::create(['name' => 'super-admin']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'aops-admin']);
        // Role::create(['name' =>  'aosp']);
    }
}
