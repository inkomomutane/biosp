<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Biosp;
use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Biosp>
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
            'ulid' => strtolower((string) Str::ulid()),
            'name' => $this->faker->name,
            'project_name' => $this->faker->word,
            'neighborhood_ulid' => Neighborhood::factory(),
        ];
    }
}
