<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserFormsTest extends DuskTestCase
{
    protected string $locate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
    }

    public function test_should_fail_creating_user_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([UserController::class, 'create']))
                ->assertRouteIs('user.create')
                ->type('name', Str::random(280))
                ->type('email', '1234432121')
                ->type('password', 'password')
                ->type('password_confirmation', 'password_12345')
                ->press('store user')
                ->assertSee(trans(key:'The :attribute may not be greater than :value characters.', replace: [
                    'attribute' => 'name',
                    'value' => 255,
                ], locale: $this->locate))
                ->assertSee(trans(key:'The :attribute must be a valid email address.', replace: ['attribute' => 'email'],
                    locale: $this->locate))
                ->assertSee(trans(key:'The :attribute confirmation does not match.', replace: ['attribute' => 'password'],
                    locale: $this->locate));
        });
    }

    public function test_should_success_create_user_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([UserController::class, 'create']))
                ->assertRouteIs('user.create')
                ->type('name', 'Nelson Alexandre')
                ->type('email', 'testmail@mail.org')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('store user')
                ->assertRouteIs('user.index')
                ->assertSee('Nelson Alexandre')
                ->assertSee('testmail@mail.org')
                ->assertSee(trans('AOSP', locale: $this->locate));
        });
    }
}
