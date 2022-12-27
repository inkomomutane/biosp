<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Register desibling testing.
     *
     * @return void
     */
    public function test_is_register_route_for_visitor_route_disabled()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);
    }
}
