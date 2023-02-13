<?php

use App\Models\PurposeOfVisit;
use Illuminate\Testing\TestResponse;

beforeEach(function () {
    rolesSeed();
    $this->purpose_of_visit = PurposeOfVisit::factory()->create();
});

it('should allow super_admins\'s to manage purpose of visits', function (TestResponse $request) {
    expect($request->status())->toBeIn([200, 302, 404]);
})->with('super_admin_manage_purpose_of_visits_requests')->group('policy');

it('should deny simple admins\'s to manage purpose of visits', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('admin_manage_purpose_of_visits_requests')->group('policy');

it('should deny aosp_admins\'s to manage purpose of visits', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_admin_manage_purpose_of_visits_requests')->group('policy');

it('should deny aosp\'s to manage purpose of visits', function (TestResponse $request) {
    expect($request->isForbidden())->toBeTrue();
})->with('aosp_manage_purpose_of_visits_requests')->group('policy');
