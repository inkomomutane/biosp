<?php

use App\Http\Controllers\Admin\DocumentTypeController;

dataset('super_admin_manage_document_types_requests', datasetsArrayOfDocumentTypes('super-admin'));
dataset('admin_manage_document_types_requests', datasetsArrayOfDocumentTypes('admin'));
dataset('aosp_admin_manage_document_types_requests', datasetsArrayOfDocumentTypes('aosp-admin'));
dataset('aosp_manage_document_types_requests', datasetsArrayOfDocumentTypes('aosp'));

function datasetsArrayOfDocumentTypes($roles): array
{
    return [
        'route document_type.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([DocumentTypeController::class, 'index'])),
        'route document_type.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([DocumentTypeController::class, 'create'])),
        'route document_type.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([DocumentTypeController::class, 'store'], $this->document_type)),
        'route document_type.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([DocumentTypeController::class, 'show'], $this->document_type)),
        'route document_type.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([DocumentTypeController::class, 'edit'], $this->document_type)),
        'route document_type.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([DocumentTypeController::class, 'update'], $this->document_type)),
        'route document_type.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([DocumentTypeController::class, 'destroy'], $this->document_type)),
    ];
}
