<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location as FacadesLocation;

class Location
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_ENV') == "dusk"){app()->setLocale("en");return $next($request);}

        $session_lang = session()->get('lang');
        $geo = FacadesLocation::get(request()->ip());

        $country = $geo?->countryName ?? 'Mozambique';
        $languages = config('app.available_locates');

        if (is_null($session_lang)) {
            if (array_key_exists($country, $languages)) {
                app()->setLocale($languages[$country]);
            } else {
                app()->setLocale('en');
            }
        } elseif (($session_lang !== app()->getLocale())) {
            app()->setLocale($session_lang);
        }

        return $next($request);
    }
}
