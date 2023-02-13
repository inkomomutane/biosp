<?php

use App\Http\Controllers\Admin\DocumentTypeController;
use App\Models\DocumentType;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    rolesSeed();
    $this->document_type = DocumentType::factory()->create();
});

it('should store document_type and redirect to route document_type.index', function () {
    $document_typeCreate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())->post(action([DocumentTypeController::class, 'store'], $document_typeCreate
    ))
        ->assertRedirectToRoute('document_type.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('document_types', $document_typeCreate);
})->group('controller');

it('should update document_type and redirect to route document_type.index', function () {
    $document_typeUpdate = [
        'name' => fake()->name(),
    ];
    $this->actingAs(login())
        ->patch(action([DocumentTypeController::class, 'update'], $this->document_type),
            $document_typeUpdate)
        ->assertRedirectToRoute('document_type.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('document_types', $document_typeUpdate);
})->group('controller');

it('should delete document_type and redirect to route document_type.index', function () {
    $document_type = clone $this->document_type;
    $this->actingAs(login())
        ->delete(action([DocumentTypeController::class, 'destroy'], $this->document_type))
        ->assertRedirectToRoute('document_type.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('document_types', [
        'name' => $document_type->name,
    ]);
})->group('controller');
