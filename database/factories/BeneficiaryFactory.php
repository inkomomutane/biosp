<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Beneficiary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Beneficiary>
 */
final class BeneficiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'full_name' => $this->faker->name,
            'number_of_visits' => $this->faker->randomNumber(),
            'birth_date' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'service_date' => $this->faker->dateTime(),
            'home_care' => $this->faker->boolean,
            'date_received' => $this->faker->dateTime(),
            'status' => $this->faker->boolean,
            'other_document_type' => $this->faker->word,
            'other_reason_opening_case' => $this->faker->word,
            'other_forwarded_service' => $this->faker->word,
            'specify_purpose_of_visit' => $this->faker->word,
            'visit_proposes' => $this->faker->word,
            'biosp_uuid' => \App\Models\Biosp::factory(),
            'genre_uuid' => \App\Models\Genre::factory(),
            'provenance_uuid' => \App\Models\Provenance::factory(),
            'reason_opening_case_uuid' => \App\Models\ReasonOpeningCase::factory(),
            'document_type_uuid' => \App\Models\DocumentType::factory(),
            'forwarded_service_uuid' => \App\Models\ForwardedService::factory(),
            'purpose_of_visit_uuid' => \App\Models\PurposeOfVisit::factory(),
        ];
    }
}