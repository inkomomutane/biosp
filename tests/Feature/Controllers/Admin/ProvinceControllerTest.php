<?php

use App\Http\Controllers\Admin\ProvinceController;
use App\Models\Province;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->province = Province::factory()->create();
});

it('should store province and redirect to route province.index', function () {
    $provinceCreate = [
        'name' => fake()->name(),
        'country_uuid' => $this->province->country_uuid,
    ];
    $this->actingAs(login())->post(action([ProvinceController::class, 'store'], $provinceCreate
    ))
        ->assertRedirectToRoute('province.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('provinces', $provinceCreate);
})->group('controller');

it('should update province and redirect to route province.index', function () {
    $provinceUpdate = [
        'name' => fake()->name(),
        'country_uuid' => $this->province->country_uuid,
    ];
    $this->actingAs(login())
        ->patch(action([ProvinceController::class, 'update'], $this->province),
            $provinceUpdate)
        ->assertRedirectToRoute('province.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('provinces', $provinceUpdate);
})->group('controller');

it('should  delete province and redirect to route province.index', function () {
    $province = clone $this->province;
    $this->actingAs(login())
        ->delete(action([ProvinceController::class, 'destroy'], $this->province))
        ->assertRedirectToRoute('province.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('provinces', [
        'name' => $province->name,
    ]);
})->group('controller');
