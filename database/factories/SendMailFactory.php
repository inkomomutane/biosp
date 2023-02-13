<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SendMail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\SendMail>
 */
final class SendMailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SendMail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ulid' => strtolower((string) \Illuminate\Support\Str::ulid()),
            'email' => $this->faker->safeEmail,
        ];
    }
}
