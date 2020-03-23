<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('layouts.header_seo')

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.header_seo')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div id="app">
        @include('layouts.header_nav')

        <div id="particles"></div>
        <div class="container-fluid logo">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
        </div>

        <main class="py-3 mb-3">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

</body>
</html>
