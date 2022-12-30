<?php

namespace Tests\Unit;

use Stevebauman\Location\Facades\Location;
use Tests\TestCase;

class BootChangeLocationTest extends TestCase
{
    public function test_is_boot_laravel_able_to_change_location_automaticaly()
    {
        $session_lang = null;
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
