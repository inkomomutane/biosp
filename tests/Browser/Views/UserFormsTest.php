<?php

namespace Tests\Browser\Views;

use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserFormsTest extends DuskTestCase
{
    protected string $locate;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
        $this->user = User::factory()->create()->assignRole('aosp');
        $this->app->setLocale('en');
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

    public function test_should_success_update_user_with_correct_data(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->login())
                ->visit(action([UserController::class, 'edit'], [
                    'user' => $this->user->uuid,
                ]))
                ->assertRouteIs('user.edit', [
                    'user' => $this->user->uuid,
                ])
                ->waitForInput('name', 5)
                ->assertInputValue('name', $this->user->name)
                ->waitForInput('email', 5)
                ->assertInputValue('email', $this->user->email)
                ->type('name', $this->user->name.' Mutane')
                ->type('email', 'testmail@mail.org')
                ->press('store user')
                ->assertRouteIs('user.index')
                ->assertSee($this->user->name.' Mutane')
                ->assertSee('testmail@mail.org')
                ->assertSee(trans('AOSP', locale: $this->locate));
        });
    }
}
