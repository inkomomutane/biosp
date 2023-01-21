<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Beneficiary;
use App\Models\Biosp;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(GenreSeeder::class);
        (User::factory()->create(['email' => 'test@test.com']))->assignRole('super-admin');
        Beneficiary::factory(4)->create();
        Biosp::factory(4)->create();
    }
}
