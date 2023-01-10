<?php

use App\Models\Province;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->province = Province::factory()->create();
});

it('should allow super_admins\'s to manage provinces', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302,404]);
})->with('super_admin_manage_provinces_requests')->group('policy');

it('should deny simple admins\'s to manage provinces', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_provinces_requests')->group('policy');

it('should deny aosp_admins\'s to manage provinces', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_provinces_requests')->group('policy');

it('should deny aosp\'s to manage provinces', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_provinces_requests')->group('policy');
