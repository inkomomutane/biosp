<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Neighborhood>
 */
final class NeighborhoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Neighborhood::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ulid' => strtolower((string) \Illuminate\Support\Str::ulid()),
            'name' => $this->faker->name,
            'province_ulid' => \App\Models\Province::factory(),
        ];
    }
}
