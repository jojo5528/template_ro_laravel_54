@extends('layouts.frontend')

@section('content')

    <!--STATUS SERVER-->
    @include('scripts.status_server')

    <div class="container bg-white py-3 mt-3 rounded shadow-lg px-5">
        <!--NEWS-->
        @include('home_news')
        <hr class="border-dark">

        <!--SUPPORT MENU-->
        <h1 class="text-center"><i class="fas fa-question-circle fa-2x text-primary"></i> SUPPORT MENU</h1>
        <hr>
        <div class="row justify-content-center menu_support">
            <div class="col-md-4 my-1">
                <a href="{{ route('register') }}" class="btn btn-lg btn-block rounded-pill text-left">
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fas fa-pencil-alt text-white"></i>
                    </span>
                    REGISTER
                </a>
                <a href="{{ route('page.vote') }}" class="btn btn-lg btn-block rounded-pill text-left">
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fas fa-hand-holding-heart text-white"></i>
                    </span>
                    VOTE SERVER
                </a>
                <a href="{{ route('page.donate') }}" class="btn btn-lg btn-block rounded-pill text-left">
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fas fa-hand-holding-usd text-white"></i>
                    </span>
                    DONATE
                </a>
            </div>
            <div class="col-md-4 offset-md-4 my-1">
                <a href="{{ route('page.info') }}" class="btn btn-lg btn-block rounded-pill text-right">
                    SERVER INFO
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fas fa-info text-white"></i>
                    </span>
                </a>
                <a href="{{ route('page.share','share') }}" class="btn btn-lg btn-block rounded-pill text-right">
                    SHARE EVENT
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fas fa-gift text-white"></i>
                    </span>
                </a>
                <a href="{{ env('APP_FB_GROUP_URL', '#!') }}" target="_blank" class="btn btn-lg btn-block rounded-pill text-right">
                    FB GROUP
                    <span class="fa-stack fa-2x text-center">
                        <i class="fa-stack-2x fas fa-circle"></i>
                        <i class="fa-stack fab fa-facebook-f text-white"></i>
                    </span>
                </a>
            </div>
        </div>
        <hr class="border-dark">

        <!--RANKING-->
        <h1 class="text-center"><i class="fas fa-crown fa-2x text-danger"></i> RANKING</h1>
        <hr>
        @include('home_ranking')
        <hr class="border-dark">

        <!--WOE REPORT-->
        <h1 class="text-center"><i class="fas fa-flag fa-2x text-danger"></i> WOE REPORT</h1>
        <hr>
        @include('home_woe')
    
    </div>

    <script>
        var path = "{{ asset('js/particles.json') }}";
        particlesJS.load('particles', path);
    </script>

@endsection