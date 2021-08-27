<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SpecifyThePropose;

class SpecifyTheProposeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = SpecifyThePropose::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'purpose_of_visit_uuid' => \App\Models\PurposeOfVisit::factory(),
            'benificiary_uuid' => \App\Models\Benificiary::factory(),
            'specify_the_propose' => $this->faker->word,
            'uuid' => $this->faker->uuid,
        ];
    }
}
