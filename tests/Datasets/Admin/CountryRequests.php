<?php

use App\Http\Controllers\Admin\CountryController;

dataset('super_admin_manage_countries_requests', datasetsArrayOfCountries('super-admin'));
dataset('admin_manage_countries_requests', datasetsArrayOfCountries('admin'));
dataset('aosp_admin_manage_countries_requests', datasetsArrayOfCountries('aosp-admin'));
dataset('aosp_manage_countries_requests', datasetsArrayOfCountries('aosp'));

function datasetsArrayOfCountries($roles): array
{
    return [
        'route country.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'index'])),
        'route country.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'create'])),
        'route country.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([CountryController::class, 'store'], $this->country)),
        'route country.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'show'], $this->country)),
        'route country.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'edit'], $this->country)),
        'route country.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([CountryController::class, 'update'], $this->country)),
        'route country.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([CountryController::class, 'destroy'], $this->country)),
        'route country.delete.forced' => fn () => $this->actingAs(login(roles: $roles))->delete(action([CountryController::class, 'destroyForced'], $this->country)),
        'route country.restore' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'restore'], $this->country)),
        'route country.trash' => fn () => $this->actingAs(login(roles: $roles))->get(action([CountryController::class, 'trashedCountries'], $this->country)),
    ];
}
