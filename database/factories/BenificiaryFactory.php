<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Benificiary;

class BenificiaryFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Benificiary::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'full_name' => $this->faker->word,
            'number_of_visits' => $this->faker->randomNumber(),
            'birth_date' => $this->faker->dateTime(),
            'phone' => $this->faker->phoneNumber,
            'service_date' => $this->faker->dateTime(),
            'home_care' => $this->faker->boolean,
            'date_received' => $this->faker->dateTime(),
            'status' => $this->faker->boolean,
            'other_document_type' => $this->faker->word,
            'other_reason_opening_case' => $this->faker->word,
            'forwarded_correct_service_uuid' => $this->faker->word,
            'other_forwarded_service' => $this->faker->word,
            'specify_forwarded_service' => $this->faker->word,
            'visit_proposes' => $this->faker->word,
            'neighborhood_uuid' => \App\Models\Neighborhood::all()->random(1)->first(),
            'genre_uuid' => \App\Models\Genre::all()->random(1)->first(),
            'provenace_uuid' => \App\Models\Provenace::all()->random(1)->first(),
            'reason_opening_case_uuid' => \App\Models\ReasonOpeningCase::all()->random(1)->first(),
            'document_type_uuid' => \App\Models\DocumentType::all()->random(1)->first(),
            'forwarded_service_uuid' => \App\Models\ForwardedService::all()->random(1)->first(),
            'purpose_of_visit_uuid' => \App\Models\PurposeOfVisit::all()->random(1)->first(),
        ];
    }
}
