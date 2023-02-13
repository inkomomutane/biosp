<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Biosp;
use App\Models\BiospSendMail;
use App\Models\SendMail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<BiospSendMail>
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
            'biosps_ulid' => Biosp::factory(),
            'send_mails_ulid' => SendMail::factory(),
            'ulid' => strtolower((string) Str::ulid()),
        ];
    }
}
