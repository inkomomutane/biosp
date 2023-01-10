<?php

use App\Http\Controllers\Admin\BiospController;
use App\Models\Biosp;
use Illuminate\Contracts\Container\BindingResolutionException;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(
/**
 * @throws BindingResolutionException
 */
function () {
    rolesSeed();
    $this->biosp = Biosp::factory()->create();
});

it('should store biosp and redirect to route biosp.index', function () {
    $biospCreate = [
        'name' => fake()->name(),
        'project_name' => fake()->name,
        'neighborhood_uuid' => $this->biosp->neighborhood_uuid,
    ];
    $this->actingAs(login())->post(action([BiospController::class, 'store'], $biospCreate
    ))
        ->assertRedirectToRoute('biosp.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('biosps', $biospCreate);
})->group('controller');

it('should update biosp and redirect to route biosp.index', function () {
    $biospUpdate = [
        'name' => fake()->name(),
        'project_name' => fake()->name,
        'neighborhood_uuid' => $this->biosp->neighborhood_uuid,
    ];
    $this->actingAs(login())
        ->patch(action([BiospController::class, 'update'], $this->biosp),
            $biospUpdate)
        ->assertRedirectToRoute('biosp.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('biosps', $biospUpdate);
})->group('controller');

it('should  delete biosp and redirect to route biosp.index', function () {
    $biosp = clone $this->biosp;
    $this->actingAs(login())
        ->delete(action([BiospController::class, 'destroy'], $this->biosp))
        ->assertRedirectToRoute('biosp.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('biosps', [
        'name' => $biosp->name,
        'project_name' => $biosp->project_name,
        'neighborhood_uuid' => $biosp->neighborhood_uuid,
    ]);
})->group('controller');
