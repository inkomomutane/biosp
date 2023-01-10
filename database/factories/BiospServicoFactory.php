<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BiospServico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BiospServico>
 */
final class BiospServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BiospServico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'model_type' => $this->faker->word,
            'model_id' => $this->faker->word,
            'table' => $this->faker->word,
        ];
    }
}
