<?php

use App\Http\Controllers\Admin\CountryController;
use App\Models\Country;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;

beforeEach(function () {
    rolesSeed();
    $this->country = Country::factory()->create();
});

it('should store country and redirect to route country.index', function () {
    $countryCreate = [
        'name' => fake()->country(),
    ];
    $this->actingAs(login())->post(action([CountryController::class, 'store'], $countryCreate
    ))
        ->assertRedirectToRoute('country.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('countries', $countryCreate);
})->group('controller');

it('should update country and redirect to route country.index', function () {
    $countryUpdate = [
        'name' => fake()->country(),
    ];
    $this->actingAs(login())
        ->patch(action([CountryController::class, 'update'], $this->country),
            $countryUpdate)
        ->assertRedirectToRoute('country.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('countries', $countryUpdate);
})->group('controller');

it('should delete country and redirect to route country.index', function () {
    $country = clone $this->country;
    $this->actingAs(login())
        ->delete(action([CountryController::class, 'destroy'], $this->country))
        ->assertRedirectToRoute('country.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('countries', [
        'name' => $country->name,
    ]);
    assertSoftDeleted('countries', [
        'name' => $country->name,
    ]);
})->group('controller');

it('should restore country and redirect to route country.trash', function () {
    $country = clone $this->country;
    $this->actingAs(login())
        ->get(action([CountryController::class, 'restore'],$country))
        ->assertRedirectToRoute('country.trash')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('countries', [
        'name' => $country->name,
        'deleted_at' => null
    ]);
})->group('controller');


it('should force delete country and redirect to route country.index', function () {
    $country = clone $this->country;
    $this->actingAs(login())
        ->delete(action([CountryController::class, 'destroyForced'], $this->country))
        ->assertRedirectToRoute('country.trash')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('countries', [
        'name' => $country->name,
    ]);
})->group('controller');
