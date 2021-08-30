<?php

namespace Database\Seeders;
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
        \App\Models\User::factory(10)->create();
        /*\App\Models\DocumentType::factory(40)->create();
        \App\Models\ForwardedService::factory(7)->create();
        \App\Models\Genre::factory(2)->create();
        \App\Models\Provenace::factory(9)->create();
        \App\Models\Province::factory(12)->create();
        \App\Models\PurposeOfVisit::factory(8)->create();
        \App\Models\ReasonOpeningCase::factory(7)->create();
        \App\Models\Syncronization::factory(10)->create();
        \App\Models\Neighborhood::factory(12)->create();
        \App\Models\Benificiary::factory(30)->create();
        \App\Models\SpecifyThePropose::factory(12)->create();
        \App\Models\SpecifyTheService::factory(15)->create();
        \App\Models\Syncronization::factory(60)->create();*/
    }
}
