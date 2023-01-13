<?php

use App\Http\Controllers\Admin\ReasonOpeningCaseController;

dataset('super_admin_manage_reason_opening_cases_requests', datasetsArrayOfReasonOpeningCases('super-admin'));
dataset('admin_manage_reason_opening_cases_requests', datasetsArrayOfReasonOpeningCases('admin'));
dataset('aosp_admin_manage_reason_opening_cases_requests', datasetsArrayOfReasonOpeningCases('aosp-admin'));
dataset('aosp_manage_reason_opening_cases_requests', datasetsArrayOfReasonOpeningCases('aosp'));

function datasetsArrayOfReasonOpeningCases($roles): array
{
    return [
        'route reason_opening_case.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([ReasonOpeningCaseController::class, 'index'])),
        'route reason_opening_case.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([ReasonOpeningCaseController::class, 'create'])),
        'route reason_opening_case.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([ReasonOpeningCaseController::class, 'store'], $this->reason_opening_case)),
        'route reason_opening_case.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([ReasonOpeningCaseController::class, 'show'], $this->reason_opening_case)),
        'route reason_opening_case.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([ReasonOpeningCaseController::class, 'edit'], $this->reason_opening_case)),
        'route reason_opening_case.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([ReasonOpeningCaseController::class, 'update'], $this->reason_opening_case)),
        'route reason_opening_case.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([ReasonOpeningCaseController::class, 'destroy'], $this->reason_opening_case)),
    ];
}
