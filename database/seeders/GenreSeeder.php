<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::updateOrInsert(
            ['uuid' => '9a4b978b-cb92-4a80-9837-e1bb617e3ec1'],
           [
               'name' => 'Male',
               'created_at' => now(),
               'updated_at' => now()
           ]);
        Genre::updateOrInsert(
            ['uuid' => 'bc6ab9f4-c279-452a-9adc-6200f61451c6'],
            [
                'name' => 'Female',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        Genre::updateOrInsert(
            [ 'uuid' => '7ca7b4f8-94be-4aa4-a341-40434e862447',],
            [
                'name' => 'Other',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
