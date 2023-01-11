<?php

use App\Http\Controllers\Admin\ForwardedServiceController;
use App\Models\ForwardedService;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->forwarded_service = ForwardedService::factory()->create();
});

it('should store forwarded_service and redirect to route forwarded_service.index', function () {
    $forwarded_serviceCreate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())->post(action([ForwardedServiceController::class, 'store'], $forwarded_serviceCreate
    ))
        ->assertRedirectToRoute('forwarded_service.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('forwarded_services', $forwarded_serviceCreate);
})->group('controller');

it('should update forwarded_service and redirect to route forwarded_service.index', function () {
    $forwarded_serviceUpdate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())
        ->patch(action([ForwardedServiceController::class, 'update'], $this->forwarded_service),
            $forwarded_serviceUpdate)
        ->assertRedirectToRoute('forwarded_service.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('forwarded_services', $forwarded_serviceUpdate);
})->group('controller');

it('should delete forwarded_service and redirect to route forwarded_service.index', function () {
    $forwarded_service = clone $this->forwarded_service;
    $this->actingAs(login())
        ->delete(action([ForwardedServiceController::class, 'destroy'], $this->forwarded_service))
        ->assertRedirectToRoute('forwarded_service.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('forwarded_services', [
        'name' => $forwarded_service->name,
    ]);
})->group('controller');
