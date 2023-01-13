<?php

it('genre seeder should run any time and not change the data inside', function () {
    $this->assertDatabaseEmpty('genres');
    $this->seed(Database\Seeders\GenreSeeder::class);
    $this->seed(Database\Seeders\GenreSeeder::class);
    $this->assertDatabaseCount('genres',3);
});
