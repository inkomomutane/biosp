<?php

use App\Http\Controllers\Admin\UserController;

dataset('super_admin_manage_users_requests', datasetsArray('super-admin'));
dataset('admin_manage_users_requests', datasetsArray('admin'));
dataset('aosp_admin_manage_users_requests', datasetsArray('aosp-admin'));
dataset('aosp_manage_users_requests', datasetsArray('aosp'));

function datasetsArray($roles): array
{
    return [
        'route user.index' => fn () => $this->actingAs(login(roles: $roles))->get(action([UserController::class, 'index'])),
        'route user.create' => fn () => $this->actingAs(login(roles: $roles))->get(action([UserController::class, 'create'])),
        'route user.store' => fn () => $this->actingAs(login(roles: $roles))->post(action([UserController::class, 'store'], $this->user)),
        'route user.show' => fn () => $this->actingAs(login(roles: $roles))->get(action([UserController::class, 'show'], $this->user)),
        'route user.edit' => fn () => $this->actingAs(login(roles: $roles))->get(action([UserController::class, 'edit'], $this->user)),
        'route user.update' => fn () => $this->actingAs(login(roles: $roles))->patch(action([UserController::class, 'update'], $this->user)),
        'route user.destroy' => fn () => $this->actingAs(login(roles: $roles))->delete(action([UserController::class, 'destroy'], $this->user)),
        'route user.grant_role' => fn () => $this->actingAs(login(roles: $roles))->post(action([UserController::class, 'grant'], $this->user)),
    ];
}
