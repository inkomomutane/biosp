<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_authenticate_and_redirect_to_home()
    {
        User::factory()->create([
            'email' => 'test@email.com',
            'password' => Hash::make('password'),
        ]);
        $response = $this->post('/login',[
            'email' => 'test@email.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');

    }
}
