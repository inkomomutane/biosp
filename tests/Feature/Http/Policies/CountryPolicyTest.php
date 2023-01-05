<?php

namespace Tests\Feature\Http\Policies;

use App\Models\Country;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryPolicyTest extends TestCase
{


    use WithFaker;

    private Country $country;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->country = Country::factory()->create();
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('country.index'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('country.index'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('country.create'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('country.create'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_store_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('country.store'))->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('country.store'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_country_show_route_not_acessible_to_no_one_with_404()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('country.show', $this->country))->assertNotFound();
            } else {
                $this->login(role: $role)->get(route('country.show', $this->country))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('country.edit', $this->country))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('country.edit', $this->country))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->put(route('country.update', $this->country))->assertRedirect();
            } else {
                $this->login(role: $role)->put(route('country.update', $this->country))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_country_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $country = Country::factory()->create();
                $this->login(role: $role)->delete(route('country.destroy', $country))->assertRedirect();
            } else {
                $country = Country::factory()->create();
                $this->login(role: $role)->delete(route('country.destroy', $this->country))->assertForbidden();
            }
        }
    }

}
