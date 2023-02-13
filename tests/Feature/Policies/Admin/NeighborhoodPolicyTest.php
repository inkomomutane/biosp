<?php

use App\Models\Neighborhood;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Testing\TestResponse;

beforeEach(
    /**
     * @throws BindingResolutionException
     */
    function () {
        rolesSeed();
        $this->neighborhood = Neighborhood::factory()->create();
    });

it('should allow super_admins\'s to manage neighborhoods', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_neighborhoods_requests')->group('policy');

it('should deny simple admins\'s to manage neighborhoods', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_neighborhoods_requests')->group('policy');

it('should deny aosp_admins\'s to manage neighborhoods', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_neighborhoods_requests')->group('policy');

it('should deny aosp\'s to manage neighborhoods', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_neighborhoods_requests')->group('policy');
