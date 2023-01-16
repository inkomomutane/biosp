<?php

use App\Models\Biosp;
use App\Models\DocumentType;
use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\Provenance;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use function Pest\Laravel\actingAs;

beforeEach(function (){
    rolesSeed();
    $this->biosp = Biosp::factory()->create();
});

it('should get all genres related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $genres = Genre::factory(2)->create();
    $this->biosp->genres()->sync($genres->pluck('uuid')->toArray());
    expect( $this->biosp->genres->pluck('name', 'uuid'))->toEqual($genres->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $genres->random()->first()->biosps()->first()->uuid
        );
});

it('should get all document types related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $documentTypes = DocumentType::factory(2)->create();
    $this->biosp->documentTypes()->sync($documentTypes->pluck('uuid')->toArray());
    expect( $this->biosp->documentTypes->pluck('name', 'uuid'))
        ->toEqual($documentTypes->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $documentTypes->random()->first()->biosps()->first()->uuid
        );
});

it('should get all forwarded services related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $forwardedServices = ForwardedService::factory(2)->create();
    $this->biosp->forwardedServices()->sync($forwardedServices->pluck('uuid')->toArray());
    expect( $this->biosp->forwardedServices->pluck('name', 'uuid'))
        ->toEqual($forwardedServices->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $forwardedServices->random()->first()->biosps()->first()->uuid
        );
});



it('should get all provenance related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $provenances = Provenance::factory(2)->create();
    $this->biosp->provenances()->sync($provenances->pluck('uuid')->toArray());
    expect( $this->biosp->provenances->pluck('name', 'uuid'))
        ->toEqual($provenances->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $provenances->random()->first()->biosps()->first()->uuid
        );
});


it('should get all purpose of visits related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $purposeOfVisits = PurposeOfVisit::factory(2)->create();
    $this->biosp->purposeOfVisits()->sync($purposeOfVisits->pluck('uuid')->toArray());
    expect( $this->biosp->purposeOfVisits ->pluck('name', 'uuid'))
        ->toEqual($purposeOfVisits->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $purposeOfVisits->random()->first()->biosps()->first()->uuid
        );
});

it('should get all reason of opening case related to a specific biosp',  function ()  {
    actingAs(login(roles: 'super-admin'));
    $reasonOpeningCases = ReasonOpeningCase::factory(2)->create();
    $this->biosp->reasonOpeningCases()->sync($reasonOpeningCases->pluck('uuid')->toArray());
    expect( $this->biosp->reasonOpeningCases->pluck('name', 'uuid'))
        ->toEqual($reasonOpeningCases->pluck('name', 'uuid'))
        ->and( $this->biosp->uuid)->toEqual(
            $reasonOpeningCases->random()->first()->biosps()->first()->uuid
        );
});


