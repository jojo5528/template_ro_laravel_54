<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header_seo')

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="{{ secure_asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
</head>
<body>

    <div id="app">
        @include('layouts.header_nav')

        <div class="container-fluid logo-pager">
            <img src="{{ secure_asset('images/logo1.png') }}" alt="{{ config('app.name', 'Laravel') }}">
        </div>

        <main class="py-3 mb-3 pager">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
    
</body>
</html>
