<?php

namespace Tests\Unit;

use Illuminate\Support\Fluent;
use Stevebauman\Location\Facades\Location;
use Tests\TestCase;
use Mockery as m;
use Stevebauman\Location\Drivers\IpApi;

class BootChangeLocationTest extends TestCase
{
    public function test_is_boot_laravel_able_to_change_location_automaticaly()
    {
        $session_lang = null;

        $driver = m::mock(IpApi::class)->makePartial();

        $response = new Fluent([
            'country' => 'United States',
            'countryCode' => 'US',
            'region' => 'CA',
            'regionName' => 'California',
            'city' => 'Long Beach',
            'zip' => '55555',
            'lat' => '50',
            'lon' => '50',
            'timezone' => 'America/Toronto',
        ]);

        $driver
        ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('process')->once()->andReturn($response);

        Location::setDriver($driver);

        $geo = Location::get();

        $country = $geo?->countryName ?? 'Mozambique';
        $languages = config('app.avaliable_locates');

        if (is_null($session_lang)) {
            if (array_key_exists($country, $languages)) {
                app()->setLocale($languages[$country]);
            } else {
                app()->setLocale('en');
            }
        } elseif (($session_lang != app()->getLocale())) {
            app()->setLocale($session_lang);
        }
        $this->assertEquals('en', app()->getLocale());
    }
}
