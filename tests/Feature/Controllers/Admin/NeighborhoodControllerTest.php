<?php

use App\Http\Controllers\Admin\NeighborhoodController;
use App\Models\Neighborhood;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->neighborhood = Neighborhood::factory()->create();
});

it('should store neighborhood and redirect to route neighborhood.index', function () {
    $neighborhoodCreate = [
        'name' => fake()->name(),
        'province_uuid' => $this->neighborhood->province_uuid,
    ];
    $this->actingAs(login())->post(action([NeighborhoodController::class, 'store'], $neighborhoodCreate
    ))
        ->assertRedirectToRoute('neighborhood.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('neighborhoods', $neighborhoodCreate);
})->group('controller');

it('should update neighborhood and redirect to route neighborhood.index', function () {
    $neighborhoodUpdate = [
        'name' => fake()->name(),
        'province_uuid' => $this->neighborhood->province_uuid,
    ];
    $this->actingAs(login())
        ->patch(action([NeighborhoodController::class, 'update'], $this->neighborhood),
            $neighborhoodUpdate)
        ->assertRedirectToRoute('neighborhood.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('neighborhoods', $neighborhoodUpdate);
})->group('controller');

it('should  delete neighborhood and redirect to route neighborhood.index', function () {
    $neighborhood = clone $this->neighborhood;
    $this->actingAs(login())
        ->delete(action([NeighborhoodController::class, 'destroy'], $this->neighborhood))
        ->assertRedirectToRoute('neighborhood.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('neighborhoods', [
        'name' => $neighborhood->name,
        'province_uuid' => $this->neighborhood->province_uuid,
    ]);
})->group('controller');
