<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class KnownOfBiospSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('known_of_biosps')->insert([
            0 => [
                'uuid' => 'ad39f425-257c-4021-937c-b543e5cb2f1',
                'name' => '1.Sensibilização aberta (mobilização, sessão temática aberta, etc.)',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ],
            1 => [
                'uuid' => 'ab02eecb-ce74-4134-9d90-0f1e3d129696',
                'name' => '2.Sensibilização fechada (sessão temática fechada)',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ],
            2 => [
                'uuid' => 'e08d1461-d8a4-465b-a52b-925654a4ff3d',
                'name' => '3.Aconselhamento (de um familiar, um amigo, um conhecido)',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ],
            3 => [
                'uuid' => '38ec66f1-2867-4d01-833c-f417af130cbb',
                'name' => '4.Visita Inicial',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ],
            4 => [
                'uuid' => '4409edbd-f889-4689-af62-3876e63fac9c',
                'name' => '5.Outros',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ],

        ]);
    }
}
