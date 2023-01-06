<?php

namespace Tests\Feature\Http\Policies;

use App\Models\Province;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProvincePolicyTest extends TestCase
{
    use WithFaker;

    private Province $province;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->province = Province::factory()->create();
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('province.index'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('province.index'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('province.create'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('province.create'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_store_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('province.store'))->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('province.store'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_province_show_route_not_acessible_to_no_one_with_404()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('province.show', $this->province))->assertNotFound();
            } else {
                $this->login(role: $role)->get(route('province.show', $this->province))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('province.edit', $this->province))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('province.edit', $this->province))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->put(route('province.update', $this->province))->assertRedirect();
            } else {
                $this->login(role: $role)->put(route('province.update', $this->province))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_province_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $province = Province::factory()->create();
                $this->login(role: $role)->delete(route('province.destroy', $province))->assertRedirect();
            } else {
                $province = Province::factory()->create();
                $this->login(role: $role)->delete(route('province.destroy', $this->province))->assertForbidden();
            }
        }
    }
}
