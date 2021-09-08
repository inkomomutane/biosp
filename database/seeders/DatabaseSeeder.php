<?php

namespace Database\Seeders;

use App\Models\Provenace;
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
      //  \App\Models\Province::factory(1)->create();
       // \App\Models\Neighborhood::factory(1)->create();
    //\App\Models\User::factory(1)->create();

        Provenace::create(['name' => "4. Benificiario do percurso Cidadão"]);
    }
}
