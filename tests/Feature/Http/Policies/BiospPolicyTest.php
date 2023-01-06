<?php

namespace Tests\Feature\Http\Policies;

use App\Models\Biosp;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BiospPolicyTest extends TestCase
{
    use WithFaker;

    private Biosp $biosp;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->biosp = Biosp::factory()->create();
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('biosp.index'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('biosp.index'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('biosp.create'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('biosp.create'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_store_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('biosp.store'))->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('biosp.store'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_biosp_show_route_not_acessible_to_no_one_with_404()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('biosp.show', $this->biosp))->assertNotFound();
            } else {
                $this->login(role: $role)->get(route('biosp.show', $this->biosp))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('biosp.edit', $this->biosp))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('biosp.edit', $this->biosp))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->put(route('biosp.update', $this->biosp))->assertRedirect();
            } else {
                $this->login(role: $role)->put(route('biosp.update', $this->biosp))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_biosp_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $biosp = Biosp::factory()->create();
                $this->login(role: $role)->delete(route('biosp.destroy', $biosp))->assertRedirect();
            } else {
                $biosp = Biosp::factory()->create();
                $this->login(role: $role)->delete(route('biosp.destroy', $this->biosp))->assertForbidden();
            }
        }
    }
}
