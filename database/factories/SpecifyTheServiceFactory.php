<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SpecifyTheService;

class SpecifyTheServiceFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = SpecifyTheService::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition()
    {
        return [
            'benificiary_uuid' => \App\Models\Benificiary::all()->random(1)->first(),
            'forwarded_service_uuid' => \App\Models\ForwardedService::all()->random(1)->first(),
            'specify_the_service' => $this->faker->word,
            'uuid' => $this->faker->uuid,
        ];
    }
}
