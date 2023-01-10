<?php

namespace Tests\Browser\Auth;

use App\Http\Middleware\Location;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WelcomeTest extends DuskTestCase
{
    protected string $locate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rolesSeed();
        $this->locate = 'en';
    }

    /***clea
     * @group authentication
     */
    public function test_should_refuse_authentication_with_wrong_data(): void
    {
        $this->browse(function (Browser $browser) {
            $this->withoutMiddleware(Location::class);
            $browser->visitRoute('login')
                ->assertRouteIs('login')
                ->type('email', '')
                ->type('password', '')
                ->press('Login')
                ->assertRouteIs('login')
                ->assertSee(trans('The :attribute field is required.', ['attribute' => 'email'], $this->locate))
                ->assertSee(trans('The :attribute field is required.', ['attribute' => 'password'], $this->locate))
                ->type('email', fake()->safeEmail())
                ->type('password', fake()->text(40))
                ->press('Login')
                ->assertSee(trans(key:'These credentials do not match our records.', locale: $this->locate));
        });
    }

    /*
     * @group authentication
     */
    public function test_should_redirected_to_login_and_after_to_dashboard(): void
    {
        $user = $this->login();
        $this->withoutMiddleware(Location::class);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                ->assertRouteIs('login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Login')
                ->assertRouteIs('dashboard');
        });
    }
}
