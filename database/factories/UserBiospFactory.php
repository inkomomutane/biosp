<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserBiosp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserBiosp>
 */
final class UserBiospFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserBiosp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ulid' => strtolower((string) \Illuminate\Support\Str::ulid()),
            'user_ulid' => \App\Models\User::factory(),
            'biosp_ulid' => \App\Models\Biosp::factory(),
        ];
    }
}
