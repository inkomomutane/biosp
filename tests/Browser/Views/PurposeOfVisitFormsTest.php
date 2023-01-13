<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\PurposeOfVisitController;
use App\Models\PurposeOfVisit;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class PurposeOfVisitFormsTest extends DuskTestCase
{
    protected string $locate;

    protected PurposeOfVisit $purpose_of_visit;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->purpose_of_visit = PurposeOfVisit::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_purpose_of_visit_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([PurposeOfVisitController::class, 'create']))
                ->assertRouteIs('purpose_of_visit.create')
                ->type('name', Str::random(280))
                ->press('store purpose_of_visit')
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_purpose_of_visit_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([PurposeOfVisitController::class, 'create']))
                ->assertRouteIs('purpose_of_visit.create')
                ->type('name', 'MozambiqueMz')
                ->press('store purpose_of_visit')
                ->assertRouteIs('purpose_of_visit.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_purpose_of_visit_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([PurposeOfVisitController::class, 'edit'], [
                    'purpose_of_visit' => $this->purpose_of_visit->uuid,
                ]))
                ->assertRouteIs('purpose_of_visit.edit', [
                    'purpose_of_visit' => $this->purpose_of_visit->uuid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->purpose_of_visit->name)
                ->type('name', $this->purpose_of_visit->name.' Mutane')->press('store purpose_of_visit')
                ->assertRouteIs('purpose_of_visit.index')
                ->assertSee($this->purpose_of_visit->name.' Mutane');
        });
    }
}
