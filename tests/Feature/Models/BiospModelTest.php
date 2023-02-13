<?php

use App\Models\Biosp;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Provenance;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    rolesSeed();
    $this->biosp = Biosp::factory()->create();
});

it('should get all genres related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $genres = Genre::factory(2)->create();
    $this->biosp->genres()->sync($genres->pluck('ulid')->toArray());
    expect($this->biosp->genres->pluck('name', 'ulid'))
        ->toEqual($genres->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $genres->random()->first()->biosps()->first()->ulid
        );
});

it('should get all document types related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $documentTypes = DocumentType::factory(2)->create();
    $this->biosp->documentTypes()->sync($documentTypes->pluck('ulid')->toArray());
    expect($this->biosp->documentTypes->pluck('name', 'ulid'))
        ->toEqual($documentTypes->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $documentTypes->random()->first()->biosps()->first()->ulid
        );
});

it('should get all forwarded services related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $forwardedServices = ForwardedService::factory(2)->create();
    $this->biosp->forwardedServices()->sync($forwardedServices->pluck('ulid')->toArray());
    expect($this->biosp->forwardedServices->pluck('name', 'ulid'))
        ->toEqual($forwardedServices->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $forwardedServices->random()->first()->biosps()->first()->ulid
        );
});

it('should get all provenance related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $provenances = Provenance::factory(2)->create();
    $this->biosp->provenances()->sync($provenances->pluck('ulid')->toArray());
    expect($this->biosp->provenances->pluck('name', 'ulid'))
        ->toEqual($provenances->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $provenances->random()->first()->biosps()->first()->ulid
        );
});

it('should get all purpose of visits related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $purposeOfVisits = PurposeOfVisit::factory(2)->create();
    $this->biosp->purposeOfVisits()->sync($purposeOfVisits->pluck('ulid')->toArray());
    expect($this->biosp->purposeOfVisits->pluck('name', 'ulid'))
        ->toEqual($purposeOfVisits->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $purposeOfVisits->random()->first()->biosps()->first()->ulid
        );
});

it('should get all reason of opening case related to a specific biosp', function () {
    actingAs(login(roles: 'super-admin'));
    $reasonOpeningCases = ReasonOpeningCase::factory(2)->create();
    $this->biosp->reasonOpeningCases()->sync($reasonOpeningCases->pluck('ulid')->toArray());
    expect($this->biosp->reasonOpeningCases->pluck('name', 'ulid'))
        ->toEqual($reasonOpeningCases->pluck('name', 'ulid'))
        ->and($this->biosp->ulid)->toEqual(
            $reasonOpeningCases->random()->first()->biosps()->first()->ulid
        );
});
