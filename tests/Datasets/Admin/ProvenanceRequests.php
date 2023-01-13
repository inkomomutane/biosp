<?php

use App\Http\Controllers\Admin\ProvenanceController;

dataset('super_admin_manage_provenances_requests', datasetsArrayOfProvenances('super-admin'));
dataset('admin_manage_provenances_requests', datasetsArrayOfProvenances('admin'));
dataset('aosp_admin_manage_provenances_requests', datasetsArrayOfProvenances('aosp-admin'));
dataset('aosp_manage_provenances_requests', datasetsArrayOfProvenances('aosp'));

function datasetsArrayOfProvenances($roles): array
{
    return [
        'route provenance.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([ProvenanceController::class, 'index'])),
        'route provenance.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([ProvenanceController::class, 'create'])),
        'route provenance.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([ProvenanceController::class, 'store'], $this->provenance)),
        'route provenance.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([ProvenanceController::class, 'show'], $this->provenance)),
        'route provenance.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([ProvenanceController::class, 'edit'], $this->provenance)),
        'route provenance.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([ProvenanceController::class, 'update'], $this->provenance)),
        'route provenance.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([ProvenanceController::class, 'destroy'], $this->provenance)),
    ];
}
