<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

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
            ['ulid' => '01gqpb8q7pj22q7jjzdry9ssva'],
            [
                'name' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        Genre::updateOrInsert(
            ['ulid' => '01gqpbb14asn1pnz0adxpc7fcr'],
            [
                'name' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Genre::updateOrInsert(
            ['ulid' => '01gqpbcbn2s7ppz3ccbszch641'],
            [
                'name' => 'Other',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
