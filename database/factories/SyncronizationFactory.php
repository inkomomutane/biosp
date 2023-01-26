<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Syncronization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Syncronization>
 */
final class SyncronizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Syncronization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'last_sync_at' => $this->faker->dateTime(),
            'user_ulid' => $this->faker->word,
            'complete' => $this->faker->boolean,
        ];
    }
}
