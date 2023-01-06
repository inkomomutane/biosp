<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Http\Controllers\Admin\NeighborhoodController;
use App\Models\Neighborhood;
use App\Models\Province;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class NeighbornhoodControllerTest extends TestCase
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
     * @group views
     */
    public function test_is_country_index_view_showing_all_neighborhoods()
    {
        [$neighborhood] = Neighborhood::factory()->count(10)->create();

        $response = $this->login(role: 'super-admin')->get(action([NeighborhoodController::class,
            'index']));

        $response->assertViewIs('pages.backend.neighborhoods.index');
        $response->assertSee($neighborhood->name);
        $response->assertViewHas('neighborhoods');
    }

    /**
     * @group views
     */
    public function test_is_country_create_view_showing_all_params_to_create_new_neighborhood()
    {
        $response = $this->login(role:'super-admin')->get(route('neighborhood.create'));
        $response->assertViewIs('pages.backend.neighborhoods.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee(__('Province'));
        $response->assertSee(__(key:'Create :resource', replace:['resource' => Str::lower(__('Neighborhood'))]));
        $response->assertSee(__(key:'Store :resource', replace:['resource' => Str::lower(__('Neighborhood'))]));
    }

    /**
     * @group views
     */
    public function test_is_store_neighborhood_route_success_with_only_valid_data_request()
    {
        // $this->withExceptionHandling();

        $neighborhoodCreate = [
            'name' => $this->faker->country(),
            'province_uuid' => (Province::factory()->create())->uuid,
        ];
        $response = $this->login(role:'super-admin')->post(route('neighborhood.store',
            $neighborhoodCreate));

        $response->assertRedirectToRoute('neighborhood.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('neighborhoods', $neighborhoodCreate);

        $neighborhoodCreate['name'] = '';
        $neighborhoodCreate['province_uuid'] = '';
        $response = $this->login(role:'super-admin')->post(route('neighborhood.store', $neighborhoodCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('neighborhoods', $neighborhoodCreate);

        $neighborhoodCreate['name'] = Str::random(200);
        $neighborhoodCreate['province_uuid'] = $this->faker->uuid;
        $response = $this->login(role:'super-admin')
            ->post(route('neighborhood.store', $neighborhoodCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('neighborhoods', $neighborhoodCreate);
    }

    /**
     * @group views
     */
    public function test_is_neighborhood_edit_view_showing_all_params_to_neighborhood_be_update()
    {
        $response = $this->login(role:'super-admin')->get(route('neighborhood.edit', [
            'neighborhood' => $this->neighborhood->uuid,
        ]));

        $response->assertViewIs('pages.backend.neighborhoods.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee($this->neighborhood->name);
        $response->assertSee(__(key:'Edit :resource', replace:['resource' => Str::lower(__('Neighborhood'))]));
        $response->assertSee(__(key:'Update :resource', replace:['resource' => Str::lower(__('Neighborhood'))]));
        $response->assertViewHas('neighborhood', $this->neighborhood);
    }

    /**
     * @group views
     */
    public function test_is_update_neighborhood_route_success_with_only_valid_data_request()
    {
        $this->withExceptionHandling();
        $neighborhoodUpdate = [
            'name' => $this->faker->country(),
            'province_uuid' => $this->neighborhood->province->uuid,
        ];
        $response = $this->login(role:'super-admin')
            ->patch(route('neighborhood.update', [
                'neighborhood' => $this->neighborhood->uuid,
            ]), $neighborhoodUpdate);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('neighborhood.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('neighborhoods', $neighborhoodUpdate);
    }

    /**
     * @group views
     */
    public function test_is_super_admin_able_to_delete_neighborhood()
    {
        $neighborhood = clone $this->neighborhood;
        $response = $this->login(role:'super-admin')
            ->delete(route('neighborhood.destroy', [
                'neighborhood' => $this->neighborhood->uuid,
            ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('neighborhood.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('neighborhoods', [
            'name' => $neighborhood->name,
            'uuid' => $neighborhood->uuid,
            'province_uuid' => $neighborhood->province_uuid,
        ]);
    }
}
