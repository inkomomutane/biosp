<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'uuid'=>'00002',
            'name'=>'edsonmeque',
            'email'=>'edsonmeque@gmail.com',
            'password'=>bcrypt('123456789'),
            'neighborhood_uuid'=>1
        ]);

        DB::table('users')->insert([
            'uuid'=>'00003',
            'name'=>'Mutane',
            'email'=>'mutane@gmail.com',
            'password'=>bcrypt('123456789'),
            'neighborhood_uuid'=>1
        ]);
    }
}
