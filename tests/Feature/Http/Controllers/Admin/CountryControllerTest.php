<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CountryController;
use App\Models\Country;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CountryControllerTest extends TestCase
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
       * @group views
       */
      public function test_is_country_index_view_showing_all_countries()
      {
          [$country] = Country::factory()->count(10)->create();

          $response = $this->login(role: 'super-admin')->get(action([CountryController::class, 'index']));

          $response->assertViewIs('pages.backend.countries.index');
          $response->assertSee($country->name);
          $response->assertViewHas('countries');
      }

    /**
     * @group views
     */
    public function test_is_country_create_view_showing_all_params_to_create_new_country()
    {
        $response = $this->login(role:'super-admin')->get(route('country.create'));
        $response->assertViewIs('pages.backend.countries.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee(__('Create :resource', replace: [
            'resource' => Str::lower(__('Country')),
        ]));
        $response->assertSee(__('Store :resource', replace: [
            'resource' => Str::lower(__('Country')),
        ]));
    }

    /**
     * @group views
     */
    public function test_is_store_country_route_success_with_only_valid_data_request()
    {
        $countryCreate = [
            'name' => $this->faker->country(),
        ];
        $response = $this->login(role:'super-admin')->post(route('country.store', $countryCreate));

        $response->assertRedirectToRoute('country.index');
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('countries', $countryCreate);

        $countryCreate['name'] = '';
        $response = $this->login(role:'super-admin')->post(route('country.store', $countryCreate));
        $response->assertSessionHasErrors(['name']);
        $this->assertDatabaseMissing('countries', $countryCreate);

        // $this->withoutExceptionHandling();
        $countryCreate['name'] = Str::random(200);
        $response = $this->login(role:'super-admin')
        ->post(route('country.store', $countryCreate))
        ->assertSessionHasErrors(['name']);
        $this->assertDatabaseMissing('countries', $countryCreate);
    }

    /**
     * @group views
     */
    public function test_is_country_edit_view_showing_all_params_to_country_be_update()
    {
        $response = $this->login(role:'super-admin')->get(route('country.edit', [
            'country' => $this->country->uuid,
        ]));

        $response->assertViewIs('pages.backend.countries.create_edit');
        $response->assertSee(__('Name'));
        $response->assertSee($this->country->name);
        $response->assertSee(__(key:'Edit :resource', replace:['resource' => Str::lower(__('Country'))]));
        $response->assertSee(__(key:'Update :resource', replace:['resource' => Str::lower(__('Country'))]));
        $response->assertViewHas('country', $this->country);
    }

    public function test_is_update_country_route_success_with_only_valid_data_request()
    {
        // $this->withExceptionHandling();
        $countryUpdate = [
            'name' => $this->faker->country(),
        ];
        $response = $this->login(role:'super-admin')
        ->patch(route('country.update', [
            'country' => $this->country->uuid,
        ]), $countryUpdate);
        // dd($response);
        $response->assertStatus(302);
        $response->assertRedirectToRoute('country.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('countries', $countryUpdate);
    }

    public function test_is_super_admin_able_to_delete_country()
    {
        $country = clone $this->country;
        $response = $this->login(role:'super-admin')
        ->delete(route('country.destroy', [
            'country' => $this->country->uuid,
        ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('country.index');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('countries', [
            'name' => $country->name,
            'uuid' => $country->uuid,
        ]);
    }

    public function test_is_super_admin_able_to_restore_deleted_country()
    {
        $country = clone Country::factory()->create([
            'deleted_at' => now(),
        ]);

        $response = $this->login(role:'super-admin')
        ->get(route('country.restore', [
            'country' => $country->uuid,
        ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('country.trash');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('countries', [
            'name' => $country->name,
            'uuid' => $country->uuid,
            'deleted_at' => null,
        ]);
    }

    public function test_is_super_admin_able_to_force_delete_country()
    {
        $country = clone $this->country;
        $response = $this->login(role:'super-admin')
        ->delete(route('country.delete.forced', [
            'country' => $this->country->uuid,
        ]));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('country.trash');
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('countries', [
            'name' => $country->name,
            'uuid' => $country->uuid,
        ]);
    }
}
