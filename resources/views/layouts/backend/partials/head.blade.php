<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @php
        if(auth()->user()){
            $asset = Session::get('dark') ? 'resources/sass/backend/style.dark.scss': 'resources/sass/backend/style.scss';
        }

   @endphp

    @auth
     @vite([ $asset , 'resources/js/backend/app.js'])
     @vite('resources/js/backend/modules/plugins.js')
    @endauth
    @guest
    @vite([ 'resources/sass/backend/style.scss', 'resources/js/backend/app.js'])
    @endguest
    <!-- Scripts -->
    @stack('css')
    @livewireStyles
</head>
