<?php

namespace Tests\Feature\Http\Controllers\Core;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('config:clear');
        $this->seed(RolesAndPermissionsSeeder::class);
        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
        User::factory()->create();
        $this->user = User::first();
        $this->user->assignRole('aosp');
    }

    public function test_is_any_authenticated_user_able_to_change_their_prefered_language_on_app()
    {
        $response = $this->actingAs($this->user)->get(route('change.language', ['lang' => 'pt']));
        $response->assertStatus(302);
        $this->assertEquals('pt', app()->getLocale());
    }

    public function test_is_any_anauthenticated_user_forbiden_to_change_their_prefered_language()
    {
        $response = $this->get(route('change.language', ['lang' => 'pt']));
        $response->assertRedirectToRoute('login');
        $this->assertNotEquals('pt', app()->getLocale());
    }
}
