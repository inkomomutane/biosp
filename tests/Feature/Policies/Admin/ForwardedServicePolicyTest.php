<?php

use App\Models\ForwardedService;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->forwarded_service = ForwardedService::factory()->create();
});

it('should allow super_admins\'s to manage document types', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_forwarded_services_requests')->group('policy');

it('should deny simple admins\'s to manage document types', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_forwarded_services_requests')->group('policy');

it('should deny aosp_admins\'s to manage document types', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_forwarded_services_requests')->group('policy');

it('should deny aosp\'s to manage document types', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_forwarded_services_requests')->group('policy');
