<?php

use App\Models\Country;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->country = Country::factory()->create();
});

it('should allow super_admins\'s to manage countries', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_countries_requests')->group('policy');

it('should deny simple admins\'s to manage countries', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_countries_requests')->group('policy');

it('should deny aosp_admins\'s to manage countries', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_countries_requests')->group('policy');

it('should deny aosp\'s to manage countries', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_countries_requests')->group('policy');
