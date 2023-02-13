<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Synchronization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Synchronization>
 */
final class SynchronizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Synchronization::class;

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
