<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\NeighborhoodController;
use App\Models\Neighborhood;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class NeighborhoodFormsTest extends DuskTestCase
{
    protected string $locate;

    protected Neighborhood $neighborhood;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->neighborhood = Neighborhood::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_neighborhood_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([NeighborhoodController::class, 'create']))
                ->assertRouteIs('neighborhood.create')
                ->type('name', Str::random(280))
                ->press('store neighborhood')
                ->assertSee(trans(key:'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_neighborhood_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([NeighborhoodController::class, 'create']))
                ->assertRouteIs('neighborhood.create')
                ->type('name', 'MozambiqueMz')
                ->press('store neighborhood')
                ->assertRouteIs('neighborhood.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_neighborhood_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([NeighborhoodController::class, 'edit'], [
                    'neighborhood' => $this->neighborhood->uuid,
                ]))
                ->assertRouteIs('neighborhood.edit', [
                    'neighborhood' => $this->neighborhood->uuid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->neighborhood->name)
                ->type('name', $this->neighborhood->name.' Mutane')
                ->press('store neighborhood')
                ->assertRouteIs('neighborhood.index')
                ->assertSee($this->neighborhood->name.' Mutane');
        });
    }
}
