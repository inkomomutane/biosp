<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Biosp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Biosp>
 */
final class BiospFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Biosp::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
            'project_name' => $this->faker->word,
            'neighborhood_uuid' => \App\Models\Neighborhood::factory(),
            'biosp_uuid' => \App\Models\Biosp::factory(),
        ];
    }
}
