<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\Admin\ProvinceController;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
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

        $provinceCreate['name'] = Str::random(200);
        $provinceCreate['country_uuid'] = $this->faker->uuid;
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
