<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\BiospController;
use App\Models\Biosp;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class BiospFormsTest extends DuskTestCase
{
    protected string $locate;

    protected Biosp $biosp;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->biosp = Biosp::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_biosp_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([BiospController::class, 'create']))
                ->assertRouteIs('biosp.create')
                ->type('name', Str::random(280))
                ->type('project_name', Str::random(280))
                ->press('store biosp')
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate))
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'project name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_biosp_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([BiospController::class, 'create']))
                ->assertRouteIs('biosp.create')
                ->type('name', 'MozambiqueMz')
                ->type('project_name', 'Akulo Akulo III')
                ->press('store biosp')
                ->assertRouteIs('biosp.index')
                ->assertSee('MozambiqueMz')
                ->assertSee('Akulo Akulo III');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_biosp_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([BiospController::class, 'edit'], [
                    'biosp' => $this->biosp->ulid,
                ]))
                ->assertRouteIs('biosp.edit', [
                    'biosp' => $this->biosp->ulid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->biosp->name)
                ->type('name', $this->biosp->name.' Mutane')
                ->assertInputValue('project_name', $this->biosp->project_name)
                ->type('project_name', $this->biosp->project_name.' Akulo')
                ->press('store biosp')
                ->assertRouteIs('biosp.index')
                ->assertSee($this->biosp->name.' Mutane')
                ->assertSee($this->biosp->project_name.' Akulo');
        });
    }
}
