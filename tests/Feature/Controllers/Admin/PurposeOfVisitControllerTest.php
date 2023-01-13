<?php

use App\Http\Controllers\Admin\PurposeOfVisitController;
use App\Models\PurposeOfVisit;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->purpose_of_visit = PurposeOfVisit::factory()->create();
});

it('should store purpose_of_visit and redirect to route purpose_of_visit.index', function () {
    $purpose_of_visitCreate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())->post(action([PurposeOfVisitController::class, 'store'], $purpose_of_visitCreate
    ))
        ->assertRedirectToRoute('purpose_of_visit.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('purpose_of_visits', $purpose_of_visitCreate);
})->group('controller');

it('should update purpose_of_visit and redirect to route purpose_of_visit.index', function () {
    $purpose_of_visitUpdate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())
        ->patch(action([PurposeOfVisitController::class, 'update'], $this->purpose_of_visit),
            $purpose_of_visitUpdate)
        ->assertRedirectToRoute('purpose_of_visit.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('purpose_of_visits', $purpose_of_visitUpdate);
})->group('controller');

it('should delete purpose_of_visit and redirect to route purpose_of_visit.index', function () {
    $purpose_of_visit = clone $this->purpose_of_visit;
    $this->actingAs(login())
        ->delete(action([PurposeOfVisitController::class, 'destroy'], $this->purpose_of_visit))
        ->assertRedirectToRoute('purpose_of_visit.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('purpose_of_visits', [
        'name' => $purpose_of_visit->name,
    ]);
})->group('controller');
