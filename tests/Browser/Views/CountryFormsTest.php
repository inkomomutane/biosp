<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\CountryController;
use App\Models\Country;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CountryFormsTest extends DuskTestCase
{
    protected string $locate;
    protected  Country $country;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->country = Country::factory()->create();
        $this->app->setLocale('en');
    }

    public function test_should_fail_creating_country_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([CountryController::class, 'create']))
                ->assertRouteIs('country.create')
                ->type('name', Str::random(280))
                ->press('store country')
                ->assertSee(trans(key:'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    public function test_should_success_create_country_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([CountryController::class, 'create']))
                ->assertRouteIs('country.create')
                ->type('name', 'MozambiqueMz')
                ->press('store country')
                ->assertRouteIs('country.index')
                ->assertSee('MozambiqueMz');
        });
    }

    public function test_should_success_update_country_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([CountryController::class, 'edit'],[
                    'country' => $this->country->uuid
                ]))
                ->assertRouteIs('country.edit',[
                    'country' => $this->country->uuid
                ])
                ->waitForInput('name',5)
                ->assertInputValue('name',$this->country->name)
                ->type('name', $this->country->name . " Mutane")
                ->press('store country')
                ->assertRouteIs('country.index')
                ->assertSee($this->country->name . " Mutane");
        });
    }
}
