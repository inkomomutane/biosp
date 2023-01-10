<?php

use App\Models\User;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->user = User::factory()->create();
});

it('should allow super_admins\'s to manage users', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302]);
})->with('super_admin_manage_users_requests')->group('policy');

it('should deny simple admins\'s to manage users', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_users_requests')->group('policy');

it('should deny aosp_admins\'s to manage users', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_users_requests')->group('policy');

it('should deny aosp\'s to manage users', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_users_requests')->group('policy');
