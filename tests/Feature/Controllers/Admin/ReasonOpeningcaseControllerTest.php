<?php

use App\Http\Controllers\Admin\ReasonOpeningCaseController;
use App\Models\ReasonOpeningCase;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->reason_opening_case = ReasonOpeningCase::factory()->create();
});

it('should store reason of opening case and redirect to route reason_opening_case.index', function () {
    $reason_opening_caseCreate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())->post(action([ReasonOpeningCaseController::class, 'store'], $reason_opening_caseCreate
    ))
        ->assertRedirectToRoute('reason_opening_case.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('reason_opening_cases', $reason_opening_caseCreate);
})->group('controller');

it('should update reason of opening case and redirect to route reason_opening_case.index', function () {
    $reason_opening_caseUpdate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())
        ->patch(action([ReasonOpeningCaseController::class, 'update'], $this->reason_opening_case),
            $reason_opening_caseUpdate)
        ->assertRedirectToRoute('reason_opening_case.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('reason_opening_cases', $reason_opening_caseUpdate);
})->group('controller');

it('should delete reason of opening case and redirect to route reason_opening_case.index', function () {
    $reason_opening_case = clone $this->reason_opening_case;
    $this->actingAs(login())
        ->delete(action([ReasonOpeningCaseController::class, 'destroy'], $this->reason_opening_case))
        ->assertRedirectToRoute('reason_opening_case.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('reason_opening_cases', [
        'name' => $reason_opening_case->name,
    ]);
})->group('controller');
