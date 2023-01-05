<?php

namespace Tests\Feature\Http\Policies;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPolicyTest extends TestCase
{
    use WithFaker;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseConfig();
        $this->user = User::factory()->create();
    }


    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_index_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('user.index'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('user.index'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_create_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('user.create'))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('user.create'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_store_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('user.store'))->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('user.store'))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_show_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('user.show', $this->user))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('user.show', $this->user))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_edit_route_with_200()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->get(route('user.edit', $this->user))->assertSuccessful();
            } else {
                $this->login(role: $role)->get(route('user.edit', $this->user))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_update_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->put(route('user.update', $this->user))->assertRedirect();
            } else {
                $this->login(role: $role)->put(route('user.update', $this->user))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_destroy_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $user = User::factory()->create();
                $this->login(role: $role)->delete(route('user.destroy', $user))->assertRedirect();
            } else {
                $user = User::factory()->create();
                $this->login(role: $role)->delete(route('user.destroy', $this->user))->assertForbidden();
            }
        }
    }

    /**
     * @group routing_permission_check
     */
    public function test_is_only_super_admin_able_to_access_user_grant_role_route_with_302()
    {
        foreach (config('app.app_roles') as $role) {
            if ($role == 'super-admin') {
                $this->login(role: $role)->post(route('user.grant_role', $this->user), ['role' => '1'])->assertRedirect();
            } else {
                $this->login(role: $role)->post(route('user.grant_role', $this->user), ['role' => '1'])->assertForbidden();
            }
        }
    }

}
