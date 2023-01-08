<?php

use App\Http\Controllers\Admin\UserController;
use App\Models\User;

beforeEach(function(){
    rolesSeed();
    $this->user = User::factory()->create();
});

it('should fetch and see paginated users',function(){
    $users = User::factory()->count(5)->create();
    login();
    $this->get(action([UserController::class, 'index']))
        ->assertViewIs('pages.backend.users.index')
        ->assertSee($users->first()->name)->assertSee($users->first()->email)
        ->assertDontSee($users->last()->name)
        ->assertDontSee($users->last()->email)
        ->assertSee(__('WITHOUT ROLES'))
        ->assertViewHas('users');
})->group('views');

