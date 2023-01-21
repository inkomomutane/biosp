<?php
use App\Http\Controllers\Admin\BiospServiceAssignmentController;
use App\Models\Biosp;
use App\Models\Genre;

beforeEach(function () {
    rolesSeed();
    $this->biosp = Biosp::factory()->create();
});

it('it should  assign genres to biosp',function (){
    $genres = Genre::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'genres'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $genres->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->genres->pluck('name', 'uuid'))
        ->toEqual($genres->pluck('name', 'uuid'));
})->group('controller');


it('it should  assign document types to biosp',function (){
    $document_types = \App\Models\DocumentType::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'documentTypes'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $document_types->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->documentTypes->pluck('name', 'uuid'))
        ->toEqual($document_types->pluck('name', 'uuid'));
})->group('controller');


it('it should  assign forwarded services to biosp',function (){
    $forwardedServices = \App\Models\ForwardedService::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'forwardedServices'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $forwardedServices->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->forwardedServices->pluck('name', 'uuid'))
        ->toEqual($forwardedServices->pluck('name', 'uuid'));
})->group('controller');


it('it should  assign provenances to biosp',function (){
    $provenances = \App\Models\Provenance::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'provenances'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $provenances->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->provenances->pluck('name', 'uuid'))
        ->toEqual($provenances->pluck('name', 'uuid'));
})->group('controller');


it('it should  assign purpose of visits to biosp',function (){
    $purposeOfVisits = \App\Models\PurposeOfVisit::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'purposeOfVisits'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $purposeOfVisits->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->purposeOfVisits->pluck('name', 'uuid'))
        ->toEqual($purposeOfVisits->pluck('name', 'uuid'));
})->group('controller');


it('it should  assign reason of opening cases to biosp',function (){
    $reasonOpeningCases = \App\Models\ReasonOpeningCase::factory(4)->create();
    $this->actingAs(login())->patch(action([BiospServiceAssignmentController::class, 'reasonOpeningCases'],[
        'biosp' => $this->biosp
    ]),[
        'services' => $reasonOpeningCases->pluck('uuid')->toArray()
    ]);
    expect( $this->biosp->reasonOpeningCases->pluck('name', 'uuid'))
        ->toEqual($reasonOpeningCases->pluck('name', 'uuid'));
})->group('controller');
