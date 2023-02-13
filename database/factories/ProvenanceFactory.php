<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Provenance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Provenance>
 */
final class ProvenanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provenance::class;

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
        ];
    }
}
