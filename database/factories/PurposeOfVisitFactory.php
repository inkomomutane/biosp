<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PurposeOfVisit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PurposeOfVisit>
 */
final class PurposeOfVisitFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = PurposeOfVisit::class;

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
        ];
    }
}
