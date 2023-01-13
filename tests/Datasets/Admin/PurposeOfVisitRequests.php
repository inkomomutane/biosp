<?php

use App\Http\Controllers\Admin\PurposeOfVisitController;

dataset('super_admin_manage_purpose_of_visits_requests', datasetsArrayOfPurposeOfVisits('super-admin'));
dataset('admin_manage_purpose_of_visits_requests', datasetsArrayOfPurposeOfVisits('admin'));
dataset('aosp_admin_manage_purpose_of_visits_requests', datasetsArrayOfPurposeOfVisits('aosp-admin'));
dataset('aosp_manage_purpose_of_visits_requests', datasetsArrayOfPurposeOfVisits('aosp'));

function datasetsArrayOfPurposeOfVisits($roles): array
{
    return [
        'route purpose_of_visit.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([PurposeOfVisitController::class, 'index'])),
        'route purpose_of_visit.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([PurposeOfVisitController::class, 'create'])),
        'route purpose_of_visit.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([PurposeOfVisitController::class, 'store'], $this->purpose_of_visit)),
        'route purpose_of_visit.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([PurposeOfVisitController::class, 'show'], $this->purpose_of_visit)),
        'route purpose_of_visit.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([PurposeOfVisitController::class, 'edit'], $this->purpose_of_visit)),
        'route purpose_of_visit.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([PurposeOfVisitController::class, 'update'], $this->purpose_of_visit)),
        'route purpose_of_visit.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([PurposeOfVisitController::class, 'destroy'], $this->purpose_of_visit)),
    ];
}
