<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PersonalAccessToken;

class PersonalAccessTokenFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = PersonalAccessToken::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'tokenable_type' => $this->faker->word,
            'tokenable_id' => $this->faker->word,
            'name' => $this->faker->name,
            'token' => $this->faker->word,
            'abilities' => $this->faker->text,
            'last_used_at' => $this->faker->dateTime(),
        ];
    }
}
