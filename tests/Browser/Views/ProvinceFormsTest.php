<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\ProvinceController;
use App\Models\Province;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class ProvinceFormsTest extends DuskTestCase
{
    protected string $locate;
    protected  Province $province;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->province = Province::factory()->create();
        $this->app->setLocale('en');
    }

    /**
     * @throws Throwable
     */
    public function test_should_fail_creating_province_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvinceController::class, 'create']))
                ->assertRouteIs('province.create')
                ->type('name', Str::random(280))
                ->press('store province')
                ->assertSee(trans(key:'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 125,
                ], locale: $this->locate));
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_create_province_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvinceController::class, 'create']))
                ->assertRouteIs('province.create')
                ->type('name', 'MozambiqueMz')
                ->press('store province')
                ->assertRouteIs('province.index')
                ->assertSee('MozambiqueMz');
        });
    }

    /**
     * @throws Throwable
     */
    public function test_should_success_update_province_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([ProvinceController::class, 'edit'],[
                    'province' => $this->province->uuid
                ]))
                ->assertRouteIs('province.edit',[
                    'province' => $this->province->uuid
                ])
                ->waitForInput('name',5)
                ->assertInputValue('name',$this->province->name)
                ->type('name', $this->province->name . " Mutane")
                ->press('store province')
                ->assertRouteIs('province.index')
                ->assertSee($this->province->name . " Mutane");
        });
    }
}
