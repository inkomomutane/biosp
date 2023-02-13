<?php

use App\Http\Controllers\Admin\ForwardedServiceController;

dataset('super_admin_manage_forwarded_services_requests', datasetsArrayOfForwardedServices('super-admin'));
dataset('admin_manage_forwarded_services_requests', datasetsArrayOfForwardedServices('admin'));
dataset('aosp_admin_manage_forwarded_services_requests', datasetsArrayOfForwardedServices('aosp-admin'));
dataset('aosp_manage_forwarded_services_requests', datasetsArrayOfForwardedServices('aosp'));

function datasetsArrayOfForwardedServices($roles): array
{
    return [
        'route forwarded_service.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([ForwardedServiceController::class, 'index'])),
        'route forwarded_service.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([ForwardedServiceController::class, 'create'])),
        'route forwarded_service.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([ForwardedServiceController::class, 'store'], $this->forwarded_service)),
        'route forwarded_service.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([ForwardedServiceController::class, 'show'], $this->forwarded_service)),
        'route forwarded_service.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([ForwardedServiceController::class, 'edit'], $this->forwarded_service)),
        'route forwarded_service.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([ForwardedServiceController::class, 'update'], $this->forwarded_service)),
        'route forwarded_service.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([ForwardedServiceController::class, 'destroy'], $this->forwarded_service)),
    ];
}
