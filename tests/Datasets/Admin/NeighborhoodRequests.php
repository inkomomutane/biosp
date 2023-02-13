<?php

use App\Http\Controllers\Admin\NeighborhoodController;

dataset('super_admin_manage_neighborhoods_requests', datasetsArrayOfNeighborhoods('super-admin'));
dataset('admin_manage_neighborhoods_requests', datasetsArrayOfNeighborhoods('admin'));
dataset('aosp_admin_manage_neighborhoods_requests', datasetsArrayOfNeighborhoods('aosp-admin'));
dataset('aosp_manage_neighborhoods_requests', datasetsArrayOfNeighborhoods('aosp'));

function datasetsArrayOfNeighborhoods($roles): array
{
    return [
        'route neighborhood.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([NeighborhoodController::class, 'index'])),
        'route neighborhood.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([NeighborhoodController::class, 'create'])),
        'route neighborhood.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([NeighborhoodController::class, 'store'], $this->neighborhood)),
        'route neighborhood.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([NeighborhoodController::class, 'show'], $this->neighborhood)),
        'route neighborhood.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([NeighborhoodController::class, 'edit'], $this->neighborhood)),
        'route neighborhood.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([NeighborhoodController::class, 'update'], $this->neighborhood)),
        'route neighborhood.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([NeighborhoodController::class, 'destroy'], $this->neighborhood)),
    ];
}
