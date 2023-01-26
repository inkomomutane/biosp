<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Beneficiary;
use App\Models\Biosp;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Provenance;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'ulid' => strtolower((string) Str::ulid()),
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
            'biosp_ulid' => Biosp::factory(),
            'genre_ulid' => Genre::factory(),
            'provenance_ulid' => Provenance::factory(),
            'reason_opening_case_ulid' => ReasonOpeningCase::factory(),
            'document_type_ulid' => DocumentType::factory(),
            'forwarded_service_ulid' => ForwardedService::factory(),
            'purpose_of_visit_ulid' => PurposeOfVisit::factory(),
        ];
    }
}
