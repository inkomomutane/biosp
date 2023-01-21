<?php

use App\Http\Controllers\Admin\BiospServiceAssignmentController;

dataset('super_admin_manage_biosp_service_assignment_requests', datasetsArrayOfBiospServiceAssignment('super-admin'));
dataset('admin_manage_biosp_service_assignment_requests', datasetsArrayOfBiospServiceAssignment('admin'));
dataset('aosp_admin_manage_biosp_service_assignment_requests', datasetsArrayOfBiospServiceAssignment('aosp-admin'));
dataset('aosp_manage_biosp_service_assignment_requests', datasetsArrayOfBiospServiceAssignment('aosp'));

function datasetsArrayOfBiospServiceAssignment($roles): array
{
    return [
        'route biosp_service_assignment.genres' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'genres'],[
                'biosp' => $this->biosp
            ])),
        'route biosp_service_assignment.document_types' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'documentTypes'],[
                'biosp' => $this->biosp
            ])),
        'route biosp_service_assignment.forwarded_services' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'forwardedServices'],[
                'biosp' => $this->biosp
            ])),
        'route biosp_service_assignment.provenances' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'provenances'],[
                'biosp' => $this->biosp
            ])),
        'route biosp_service_assignment.purpose_of_visits' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'purposeOfVisits'],[
                'biosp' => $this->biosp
            ])),
        'route biosp_service_assignment.reason_opening_cases' => fn () => $this->actingAs(login(roles: $roles))
            ->patch(action([BiospServiceAssignmentController::class, 'reasonOpeningCases'],[
                'biosp' => $this->biosp
            ])),

    ];
}
