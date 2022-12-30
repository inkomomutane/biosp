<?php

namespace Tests\Browser;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateAndStoreUserTest extends DuskTestCase
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

    public function test_is_admin_us_up_to_store_user_without_error_on_screen()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)->visit(route('user.create'))
            ->type('name', 'Mulato')
            ->typeSlowly('email', 'mulatolas@gmail.com')
            ->typeSlowly('password', 'password')
            ->typeSlowly('password_confirmation', 'password')
            ->press('store user')
            ->assertRouteIs('user.index');
        });
    }
}
