<?php

use App\Models\ReasonOpeningCase;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->reason_opening_case = ReasonOpeningCase::factory()->create();
});

it('should allow super_admins\'s to manage reason of opening case', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_reason_opening_cases_requests')->group('policy');

it('should deny simple admins\'s to manage reason of opening case', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_reason_opening_cases_requests')->group('policy');

it('should deny aosp_admins\'s to manage reason of opening case', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_reason_opening_cases_requests')->group('policy');

it('should deny aosp\'s to manage reason of opening case', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_reason_opening_cases_requests')->group('policy');
