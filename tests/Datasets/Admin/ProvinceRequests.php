<?php


use App\Http\Controllers\Admin\ProvinceController;

dataset('super_admin_manage_provinces_requests', datasetsArrayOfProvinces('super-admin'));
dataset('admin_manage_provinces_requests', datasetsArrayOfProvinces('admin'));
dataset('aosp_admin_manage_provinces_requests', datasetsArrayOfProvinces('aosp-admin'));
dataset('aosp_manage_provinces_requests', datasetsArrayOfProvinces('aosp'));

function datasetsArrayOfProvinces($roles): array
{
    return [
        'route province.index' => fn() => $this->actingAs(login(roles: $roles))->get(action([ProvinceController::class, 'index'])),
        'route province.create' => fn() => $this->actingAs(login(roles: $roles))->get(action([ProvinceController::class, 'create'])),
        'route province.store' => fn() => $this->actingAs(login(roles: $roles))->post(action([ProvinceController::class, 'store'], $this->province)),
        'route province.show' => fn() => $this->actingAs(login(roles: $roles))->get(action([ProvinceController::class, 'show'], $this->province)),
        'route province.edit' => fn() => $this->actingAs(login(roles: $roles))->get(action([ProvinceController::class, 'edit'], $this->province)),
        'route province.update' => fn() => $this->actingAs(login(roles: $roles))->patch(action([ProvinceController::class, 'update'], $this->province)),
        'route province.destroy' => fn() => $this->actingAs(login(roles: $roles))->delete(action([ProvinceController::class, 'destroy'], $this->province)),
    ];
}
