<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Syncronization;

class SyncronizationFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Syncronization::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition()
    {
        return [
            'last_sync_at' => $this->faker->dateTime(),
            'user_uuid' => \App\Models\User::all()->random(1)->first(),
            'complete' => $this->faker->boolean,
        ];
    }
}
