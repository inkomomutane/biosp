<?php

namespace Tests\Browser;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;


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

    public function test_user_can_authenticate_and_redirect_to_empty_dashboard()
    {
        $user = User::factory()->create(
            [
                'password' => Hash::make('password'),
            ]
        );

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('login'))
            ->type('email', $user->email)
            ->type('password', 'password')
            ->press('Login')
            ->assertPathIs('/dashboard')->screenshot('dashboard');
        });
    }


    public function test_super_admin_user_can_authenticate_and_redirect_to_complete_dashboard()
    {
        $user = $this->user;

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('login'))
            ->type('email', $user->email)
            ->type('password', 'password')
            ->press('Login')
            ->assertPathIs('/dashboard')->screenshot('dashboard');
        });
    }
}
