<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\ForwardedServiceController;
use App\Models\ForwardedService;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class ForwardedServiceFormsTest extends DuskTestCase
{
    protected string $locate;

    protected ForwardedService $forwarded_service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->forwarded_service = ForwardedService::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_forwarded_service_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ForwardedServiceController::class, 'create']))
                ->assertRouteIs('forwarded_service.create')
                ->type('name', Str::random(280))
                ->press('store forwarded_service')
                ->assertSee(trans(key: 'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_forwarded_service_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ForwardedServiceController::class, 'create']))
                ->assertRouteIs('forwarded_service.create')
                ->type('name', 'MozambiqueMz')
                ->press('store forwarded_service')
                ->assertRouteIs('forwarded_service.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_forwarded_service_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ForwardedServiceController::class, 'edit'], [
                    'forwarded_service' => $this->forwarded_service->ulid,
                ]))
                ->assertRouteIs('forwarded_service.edit', [
                    'forwarded_service' => $this->forwarded_service->ulid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->forwarded_service->name)
                ->type('name', $this->forwarded_service->name.' Mutane')->press('store forwarded_service')
                ->assertRouteIs('forwarded_service.index')
                ->assertSee($this->forwarded_service->name.' Mutane');
        });
    }
}
