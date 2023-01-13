<?php

use App\Http\Controllers\Admin\ProvenanceController;
use App\Models\Provenance;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->provenance = Provenance::factory()->create();
});

it('should store provenance and redirect to route provenance.index', function () {
    $provenanceCreate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())->post(action([ProvenanceController::class, 'store'], $provenanceCreate
    ))
        ->assertRedirectToRoute('provenance.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('provenances', $provenanceCreate);
})->group('controller');

it('should update provenance and redirect to route provenance.index', function () {
    $provenanceUpdate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())
        ->patch(action([ProvenanceController::class, 'update'], $this->provenance),
            $provenanceUpdate)
        ->assertRedirectToRoute('provenance.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('provenances', $provenanceUpdate);
})->group('controller');

it('should delete provenance and redirect to route provenance.index', function () {
    $provenance = clone $this->provenance;
    $this->actingAs(login())
        ->delete(action([ProvenanceController::class, 'destroy'], $this->provenance))
        ->assertRedirectToRoute('provenance.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('provenances', [
        'name' => $provenance->name,
    ]);
})->group('controller');
