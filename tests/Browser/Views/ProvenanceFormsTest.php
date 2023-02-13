<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\ProvenanceController;
use App\Models\Provenance;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class ProvenanceFormsTest extends DuskTestCase
{
    protected string $locate;

    protected Provenance $provenance;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->provenance = Provenance::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_provenance_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvenanceController::class, 'create']))
                ->assertRouteIs('provenance.create')
                ->type('name', Str::random(280))
                ->press('store provenance')
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_provenance_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvenanceController::class, 'create']))
                ->assertRouteIs('provenance.create')
                ->type('name', 'MozambiqueMz')
                ->press('store provenance')
                ->assertRouteIs('provenance.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_provenance_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvenanceController::class, 'edit'], [
                    'provenance' => $this->provenance->ulid,
                ]))
                ->assertRouteIs('provenance.edit', [
                    'provenance' => $this->provenance->ulid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->provenance->name)
                ->type('name', $this->provenance->name.' Mutane')->press('store provenance')
                ->assertRouteIs('provenance.index')
                ->assertSee($this->provenance->name.' Mutane');
        });
    }
}
