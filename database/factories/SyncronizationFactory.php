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
    public function definition(): array
    {
        return [
            'last_sync_at' => $this->faker->dateTime(),
            'user_uuid' => $this->faker->uuid,
            'complete' => $this->faker->boolean,
        ];
    }
}
