<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DocumentType;

class DocumentTypeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = DocumentType::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'uuid' => $this->faker->uuid,
        ];
    }
}
