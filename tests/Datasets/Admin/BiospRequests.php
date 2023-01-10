<?php


use App\Http\Controllers\Admin\BiospController;

dataset('super_admin_manage_biosps_requests', datasetsArrayOfBiosps('super-admin'));
dataset('admin_manage_biosps_requests', datasetsArrayOfBiosps('admin'));
dataset('aosp_admin_manage_biosps_requests', datasetsArrayOfBiosps('aosp-admin'));
dataset('aosp_manage_biosps_requests', datasetsArrayOfBiosps('aosp'));

function datasetsArrayOfBiosps($roles): array
{
    return [
        'route biosp.index' => fn() => $this->actingAs(login(roles: $roles))->get(action([BiospController::class, 'index'])),
        'route biosp.create' => fn() => $this->actingAs(login(roles: $roles))->get(action([BiospController::class, 'create'])),
        'route biosp.store' => fn() => $this->actingAs(login(roles: $roles))->post(action([BiospController::class, 'store'], $this->biosp)),
        'route biosp.show' => fn() => $this->actingAs(login(roles: $roles))->get(action([BiospController::class, 'show'], $this->biosp)),
        'route biosp.edit' => fn() => $this->actingAs(login(roles: $roles))->get(action([BiospController::class, 'edit'], $this->biosp)),
        'route biosp.update' => fn() => $this->actingAs(login(roles: $roles))->patch(action([BiospController::class, 'update'], $this->biosp)),
        'route biosp.destroy' => fn() => $this->actingAs(login(roles: $roles))->delete(action([BiospController::class, 'destroy'], $this->biosp)),
    ];
}
