<?php

use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    rolesSeed();
    $this->user = User::factory()->create();
});

it('should store user and redirect to route user.index', function () {
    $userCreate = [
        'email' => fake()->safeEmail(),
        'name' => fake()->userName(),
    ];
    $this->actingAs(login())->post(action([UserController::class, 'store'],
        array_merge([
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $userCreate)
    ))
        ->assertRedirectToRoute('user.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('users', $userCreate);
})->group('controller');

it('should update user and redirect to route user.index', function () {
    $userUpdate = [
        'email' => fake()->safeEmail(),
        'name' => fake()->userName(),
    ];
    $this->actingAs(login())
        ->patch(action([UserController::class, 'update'], $this->user),
            $userUpdate)
        ->assertRedirectToRoute('user.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseHas('users', $userUpdate);
})->group('controller');

it('should delete user and redirect to route user.index', function () {
    $user = clone  $this->user;
    $this->actingAs(login())
        ->delete(action([UserController::class, 'destroy'], $this->user))
        ->assertRedirectToRoute('user.index')
        ->assertSessionDoesntHaveErrors();
    assertDatabaseMissing('users', [
        'name' => $user->name,
        'email' => $user->email,
    ]);
})->group('controller');

it('should change user role and redirect to user.show', function () {
    $role = Role::first();
    $biosps = \App\Models\Biosp::factory(5)->create();
    login();
    $response =
        $this->post(action([UserController::class, 'grant'], $this->user),
            [
                'role' => $role->id,
                'biosps' => $biosps->pluck('uuid')->toArray(),
            ]
        )
        ->assertRedirectToRoute('user.show', [
            'user' => $this->user->uuid,
        ]);
    expect($this->user->hasRole($role))->toBeTrue();
})->group('controller');
