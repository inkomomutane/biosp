<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BiospSendMail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BiospSendMail>
 */
final class BiospSendMailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BiospSendMail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'biosps_uuid' => \App\Models\Biosp::factory(),
            'send_mails_uuid' => \App\Models\SendMail::factory(),
            'uuid' => $this->faker->uuid,
        ];
    }
}
