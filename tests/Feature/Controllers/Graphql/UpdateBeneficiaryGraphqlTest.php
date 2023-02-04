<?php


use App\Models\Biosp;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Provenance;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;

beforeEach(function () {
    $this->bootRefreshesSchemaCache();
    rolesSeed();
});
it('it should update beneficiary from graphql', function () {
    $biosp = Biosp::factory()->create();
    $genres = Genre::factory(5)->create();
    $biosp->genres()->sync($genres->pluck('ulid')->toArray());
    $provenances = Provenance::factory(5)->create();
    $biosp->provenances()->sync($provenances->pluck('ulid')->toArray());
    $reason_opening_cases = ReasonOpeningCase::factory(3)->create();
    $biosp->reasonOpeningCases()->sync($reason_opening_cases->pluck('ulid')->toArray());
    $document_types = DocumentType::factory(2)->create();
    $biosp->documentTypes()->sync($document_types->pluck('ulid')->toArray());
    $forwarded_services = ForwardedService::factory(2)->create();
    $biosp->forwardedServices()->sync($forwarded_services->pluck('ulid')->toArray());
    $purpose_of_visits = PurposeOfVisit::factory(2)->create();
    $biosp->purposeOfVisits()->sync($purpose_of_visits->pluck('ulid')->toArray());
    $user = login(roles: 'aosp');
    $user->biosps()->sync($biosp->ulid);
    $beneficiary = \App\Models\Beneficiary::factory()->create([
            "genre_ulid" => $genres->first()->ulid,
            "provenance_ulid" => $provenances->first()->ulid,
            "reason_opening_case_ulid" => $reason_opening_cases->first()->ulid,
            "document_type_ulid" => $document_types->first()->ulid,
            "forwarded_service_ulid" => $forwarded_services->first()->ulid,
             "purpose_of_visit_ulid" => $purpose_of_visits->first()->ulid
    ]);
    $token = $user->createToken('token')->plainTextToken;
    $this->graphQL(query:
        'mutation updateBeneficiary{
            updateBeneficiary(
            ulid: "'.$beneficiary->ulid.'"
            full_name:"Muss Bin Pique"
            number_of_visits: 3
            birth_date:"800-04-3"
            phone:"847607095"
            service_date:"800-04-3"
            home_care:false
            date_received: "1999-09-8"
            status:true
            other_document_type:""
            other_reason_opening_case:""
            other_forwarded_service:""
            specify_purpose_of_visit:""
            visit_proposes:""
            genre_ulid: "'.$genres->first()->ulid.'"
            provenance_ulid: "'.$provenances->first()->ulid.'"
            reason_opening_case_ulid: "'.$reason_opening_cases->first()->ulid.'"
            document_type_ulid: "'.$document_types->first()->ulid.'"
            forwarded_service_ulid: "'.$forwarded_services->first()->ulid.'"
            purpose_of_visit_ulid: "'.$purpose_of_visits->first()->ulid.'"
            ){
            ulid
            full_name
            number_of_visits
            birth_date
            phone
            service_date
            home_care
            date_received
            other_document_type
            other_reason_opening_case
            other_forwarded_service
            specify_purpose_of_visit
            genre{
                ulid
                name
             }
            provenance{
                ulid
                name
            }
             document_type{
                ulid
                name
             }

            reason_opening_case{
                ulid
                name
            }

            forwarded_service{
                ulid
                name
            }
            purpose_of_visit{
                ulid
                name
            }
            visit_proposes
            status
            created_at
            updated_at
            }
        }'
    )->assertJsonStructure([
        'data' => [
            'updateBeneficiary' => [
                'ulid',
                'full_name',
                'birth_date',
                'number_of_visits',
                'service_date',
                'home_care',
                'date_received',
                'status',
                'other_document_type',
                'other_reason_opening_case',
                'other_forwarded_service',
                'specify_purpose_of_visit',
                'visit_proposes',
                'genre' => [
                    'ulid',
                    'name',
                ],
                'provenance' => [
                    'ulid',
                    'name',
                ],
                'reason_opening_case' => [
                    'ulid',
                    'name',
                ],
                'document_type' => [
                    'ulid',
                    'name',
                ],
                'forwarded_service' => [
                    'ulid',
                    'name',
                ],
                'purpose_of_visit' => [
                    'ulid',
                    'name',
                ],
                'created_at',
                'updated_at',
            ],
        ],
    ])->withHeaders([
        'Authorization' => 'Bearer '.$token,
    ]);
});
