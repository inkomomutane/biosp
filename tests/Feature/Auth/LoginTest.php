<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Login Auth.
     *
     * @return void
     */
    public function test_user_can_authenticate_and_redirect_to_dashboard()
    {
        User::factory()->create([
            'email' => 'test@email.com',
            'password' => Hash::make('password'),
        ]);
        $response = $this->post(route('login'), [
            'email' => 'test@email.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard'));
    }
}
