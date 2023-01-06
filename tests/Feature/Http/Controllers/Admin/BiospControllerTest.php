<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BiospController;
use App\Models\Biosp;
use App\Models\Neighborhood;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class BiospControllerTest extends TestCase
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
     * @group views
     */
    public function test_is_biosp_index_view_showing_all_biosps()
    {
        [$neighborhood] = Biosp::factory()->count(10)->create();

        $response = $this->login(role: 'super-admin')->get(action([BiospController::class, 'index']));

        $response->assertViewIs('pages.backend.biosps.index');
        $response->assertSee($neighborhood->name);
        $response->assertViewHas('biosps');
    }

    /**
     * @group views
     */
    public function test_is_biosp_create_view_showing_all_params_to_create_new_biosp()
    {
        $response = $this->login(role:'super-admin')->get(route('biosp.create'));
        $response->assertViewIs('pages.backend.biosps.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee(__('Neighborhood'));
        $response->assertSee(__(key:'Create :resource', replace:['resource' => Str::lower(__('Biosp'))]));
        $response->assertSee(__(key:'Store :resource', replace:['resource' => Str::lower(__('Biosp'))]));
    }

    /**
     * @group views
     */
    public function test_is_store_biosp_route_success_with_only_valid_data_request()
    {
        // $this->withExceptionHandling();

        $biospCreate = [
            'name' => $this->faker->country(),
            'project_name' => $this->faker->name,
            'neighborhood_uuid' => (Neighborhood::factory()->create())->uuid,
        ];
        $response = $this->login(role:'super-admin')->post(route('biosp.store', $biospCreate));

        $response->assertRedirectToRoute('biosp.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('biosps', $biospCreate);

        $biospCreate['name'] = '';
        $biospCreate['neighborhood_uuid'] = '';
        $biospCreate['project_name'] = '';
        $response = $this->login(role:'super-admin')->post(route('biosp.store', $biospCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('biosps', $biospCreate);

        $biospCreate['name'] = Str::random(200);
        $biospCreate['project_name'] = Str::random(200);
        $biospCreate['neighborhood_uuid'] = $this->faker->uuid;

        $response = $this->login(role:'super-admin')
            ->post(route('biosp.store', $biospCreate));
        $response->assertSessionHasErrors();
        $this->assertDatabaseMissing('biosps', $biospCreate);
    }

    /**
     * @group views
     */
    public function test_is_biosp_edit_view_showing_all_params_to_biosp_be_update()
    {
        $response = $this->login(role:'super-admin')->get(route('biosp.edit', [
            'biosp' => $this->biosp->uuid,
        ]));

        $response->assertViewIs('pages.backend.biosps.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee($this->biosp->name);
        $response->assertSee(__(key:'Edit :resource', replace:['resource' => Str::lower(__('Biosp'))]));
        $response->assertSee(__(key:'Update :resource', replace:['resource' => Str::lower(__('Biosp'))]));
        $response->assertViewHas('biosp', $this->biosp);
    }

    /**
     * @group views
     */
    public function test_is_update_biosp_route_success_with_only_valid_data_request()
    {
        $this->withExceptionHandling();
        $biospUpdate = [
            'name' => $this->faker->country(),
            'neighborhood_uuid' => $this->biosp->neighborhood->uuid,
            'project_name' => $this->faker->name,
        ];
        $response = $this->login(role:'super-admin')
            ->patch(route('biosp.update', [
                'biosp' => $this->biosp->uuid,
            ]), $biospUpdate);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('biosp.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('biosps', $biospUpdate);
    }

    /**
     * @group views
     */
    public function test_is_super_admin_able_to_delete_biosp()
    {
        $biosp = clone $this->biosp;
        $response = $this->login(role:'super-admin')
            ->delete(route('biosp.destroy', [
                'biosp' => $this->biosp->uuid,
            ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('biosp.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('biosps', [
            'name' => $biosp->name,
            'uuid' => $biosp->uuid,
            'neighborhood_uuid' => $biosp->neighborhood_uuid,
            'project_name' => $biosp->project_name,
        ]);
    }
}
