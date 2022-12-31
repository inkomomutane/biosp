<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Register desibling testing.
     *
     * @return void
     */
    public function test_is_the_register_route_disabled_for_guest_or_visitors()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);
    }
}
