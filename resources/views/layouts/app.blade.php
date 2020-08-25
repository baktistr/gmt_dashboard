<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="c-app">
    @include('layouts.partials.sidebar')

    <div class="c-wrapper c-fixed-components">
        @include('layouts.partials.header')

        <div class="c-body">
            <main class="c-main mb-4">
                @yield('content')
            </main>
        </div>

        <footer class="c-footer">
            <div>© {{ date('Y') }} <a href="https://cmdspacelabs.com" target="_blank">CMD+Space Labs</a>.</div>
        </footer>
    </div>
</div>
</body>
</html>
