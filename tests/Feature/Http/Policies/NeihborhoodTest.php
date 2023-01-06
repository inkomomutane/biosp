<?php

namespace Tests\Feature\Http\Policies;

use App\Models\Neighborhood;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NeihborhoodTest extends TestCase
{
    use WithFaker;

    private Neighborhood $neighborhood;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->neighborhood = Neighborhood::factory()->create();
    }


    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('neighborhood.index'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('neighborhood.index'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('neighborhood.create'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('neighborhood.create'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_store_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('neighborhood.store'))->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('neighborhood.store'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_neighborhood_show_route_not_acessible_to_no_one_with_404()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('neighborhood.show', $this->neighborhood))->assertNotFound();
            } else {
                $this->login(role: $role)->get(route('neighborhood.show', $this->neighborhood))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('neighborhood.edit', $this->neighborhood))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('neighborhood.edit', $this->neighborhood))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->put(route('neighborhood.update', $this->neighborhood))->assertRedirect();
            } else {
                $this->login(role: $role)->put(route('neighborhood.update', $this->neighborhood))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_neighborhood_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $neighborhood = Neighborhood::factory()->create();
                $this->login(role: $role)->delete(route('neighborhood.destroy', $neighborhood))->assertRedirect();
            } else {
                $neighborhood = Neighborhood::factory()->create();
                $this->login(role: $role)->delete(route('neighborhood.destroy', $this->neighborhood))->assertForbidden();
            }
        }
    }

}
