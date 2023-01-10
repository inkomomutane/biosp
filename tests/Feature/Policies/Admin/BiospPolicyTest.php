<?php

use App\Models\Biosp;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Testing\TestResponse;

beforeEach(
/**
 * @throws BindingResolutionException
 */
    function () {
        rolesSeed();
        $this->biosp = Biosp::factory()->create();
    });

it('should allow super_admins\'s to manage biosps', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_biosps_requests')->group('policy');

it('should deny simple admins\'s to manage biosps', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_biosps_requests')->group('policy');

it('should deny aosp_admins\'s to manage biosps', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_biosps_requests')->group('policy');

it('should deny aosp\'s to manage biosps', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_biosps_requests')->group('policy');
