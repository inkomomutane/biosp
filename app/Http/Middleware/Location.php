<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stevebauman\Location\Facades\Location as FacadesLocation;

class Location
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response|RedirectResponse
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (env('APP_ENV') === 'dusk') {
            app()->setLocale('en');

            return $next($request);
        }
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
