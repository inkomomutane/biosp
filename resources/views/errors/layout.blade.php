<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/sass/errors.scss','resources/js/errors.js'])
</head>
<body>
    <section>
        <img src="" alt="Erro @yield('code') @yield('message')" class="resource_image" data-image="@yield('image')">
        <div class="message">
            <h1> {{__('Error')}} @yield('code') | @yield('message')</h1>
        </div>
        <div class="home">
            <a href="{{ URL::previous()}}">
                <i class="align-middle" data-feather="corner-up-left"></i>
                &nbsp; {{__('Back')}}</a>
        </div>
    </section>
</body>
</html>
