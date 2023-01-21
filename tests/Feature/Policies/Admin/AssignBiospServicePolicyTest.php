<?php

use App\Models\Biosp;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->biosp = Biosp::factory()->create();
});

it('should allow super_admins\'s to manage biosp service assignment', function (TestResponse $request) {
    expect($request->isRedirection())->toBeTrue();
})->with('super_admin_manage_biosp_service_assignment_requests')->group('policy');

it('should deny simple admins\'s to manage biosp service assignment', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_biosp_service_assignment_requests')->group('policy');

it('should deny aosp_admins\'s to manage biosp service assignment', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_biosp_service_assignment_requests')->group('policy');

it('should deny aosp\'s to manage biosp service assignment', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_biosp_service_assignment_requests')->group('policy');
