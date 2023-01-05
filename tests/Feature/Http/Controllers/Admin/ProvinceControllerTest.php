<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\Admin\ProvinceController;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProvinceControllerTest extends TestCase
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

    /**
     * @group views
     */
    public function test_is_country_index_view_showing_all_provinces()
    {
        [$country] = Province::factory()->count(10)->create();

        $response = $this->login(role: 'super-admin')->get(action([ProvinceController::class, 'index']));

        $response->assertViewIs('pages.backend.provinces.index');
        $response->assertSee($country->name);
        $response->assertViewHas('provinces');
    }

    /**
     * @group views
     */
    public function test_is_country_create_view_showing_all_params_to_create_new_province()
    {
        $response = $this->login(role:'super-admin')->get(route('province.create'));
        $response->assertViewIs('pages.backend.provinces.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee(__('Country'));
        $response->assertSee(__('Create province'));
        $response->assertSee(__('Store province'));
    }

    /**
     * @group views
     */
    public function test_is_store_province_route_success_with_only_valid_data_request()
    {
        // $this->withExceptionHandling();

        $provinceCreate = [
            'name' => $this->faker->country(),
            'country_uuid' => (Country::factory()->create())->uuid,
        ];
        $response = $this->login(role:'super-admin')->post(route('province.store', $provinceCreate));

        $response->assertRedirectToRoute('province.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('provinces', $provinceCreate);

        $provinceCreate['name'] = '';
        $provinceCreate['country_uuid'] = '';
        $response = $this->login(role:'super-admin')->post(route('province.store', $provinceCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('provinces', $provinceCreate);

        $provinceCreate['name'] = $this->faker->text(200);
        $provinceCreate['name'] = $this->faker->uuid;
        $response = $this->login(role:'super-admin')
            ->post(route('province.store', $provinceCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('provinces', $provinceCreate);
    }

    /**
     * @group views
     */
    public function test_is_province_edit_view_showing_all_params_to_province_be_update()
    {
        $response = $this->login(role:'super-admin')->get(route('province.edit', [
            'province' => $this->province->uuid,
        ]));

        $response->assertViewIs('pages.backend.provinces.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee($this->province->name);
        $response->assertSee(__('Edit province'));
        $response->assertSee(__('Update province'));
        $response->assertViewHas('province', $this->province);
    }

    /**
     * @group views
     */
    public function test_is_update_province_route_success_with_only_valid_data_request()
    {
        $this->withExceptionHandling();
        $provinceUpdate = [
            'name' => $this->faker->country(),
            'country_uuid' => $this->province->country->uuid,
        ];
        $response = $this->login(role:'super-admin')
            ->patch(route('province.update', [
                'province' => $this->province->uuid,
            ]), $provinceUpdate);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('province.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('provinces', $provinceUpdate);
    }

    /**
     * @group views
     */
    public function test_is_super_admin_able_to_delete_province()
    {
        $province = clone $this->province;
        $response = $this->login(role:'super-admin')
            ->delete(route('province.destroy', [
                'province' => $this->province->uuid,
            ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('province.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('provinces', [
            'name' => $province->name,
            'uuid' => $province->uuid,
            'country_uuid' => $province->country_uuid,
        ]);
    }
}
