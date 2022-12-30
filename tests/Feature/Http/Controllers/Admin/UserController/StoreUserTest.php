<?php

namespace Tests\Feature\Http\Controllers\Admin\UserController;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('config:clear');
        $this->seed(RolesAndPermissionsSeeder::class);
        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
        User::factory()->create();
        $this->user = User::first();
        $this->user->assignRole('super-admin');
    }

    /**
     * @group routing
     */
    public function test_is_store_user_route_forbide_to_sucess_with_empty_request()
    {
        $response = $this->actingAs($this->user)->post(route('user.store'));

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
    }

    /**
     * @group routing
     */
    public function test_is_store_user_route_forbide_to_sucess_with_invalid_data_request()
    {
        $response = $this->actingAs($this->user)->post(route('user.store', [
            'email' => $this->faker->userName,
            'name' => $this->faker->words(400),
            'password' => $this->faker()->words(3),
            'password_confirmation' => $this->faker()->words(7),
        ]));

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');
    }

    /**
     * @group routing_active
     */
    public function test_is_store_user_route_success_with_valid_data_request()
    {
        $userCreate = [
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->userName(),
        ];
        $response = $this->actingAs($this->user)->post(route('user.store', array_merge([
            'password' => 'password',
            'password_confirmation' => 'password',
        ], $userCreate)));

        $response->assertRedirectToRoute('user.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('users', $userCreate);
        $lastCreatedUser = User::latest()->first();
        $this->assertEquals($userCreate, [
            'name' => $lastCreatedUser->name,
            'email' => $lastCreatedUser->email,
        ]);
    }
}
