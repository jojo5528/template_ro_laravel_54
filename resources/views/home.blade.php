@extends('layouts.frontend')

@section('content')

    <!--STATUS SERVER-->
    

    <div class="container bg-white py-3 mt-3 rounded shadow-lg px-5">
        <!--NEWS-->
        @include('scripts.news')
        <hr class="border-dark">

        

        <!--RANKING-->
        <h1 class="text-center"><i class="fas fa-crown fa-2x text-danger"></i> จัดอันดับต่างๆ</h1>
        <hr>
        @include('scripts.ranking')
        <hr class="border-dark">

        <!--WOE REPORT-->
        <h1 class="text-center"><i class="fas fa-flag fa-2x text-danger"></i> รายงานผลกิลด์วอ</h1>
        <hr>
        @include('scripts.woe')
    
    </div>

    <script>
        var path = {!! json_encode(secure_asset('js/particles.json')) !!};
        particlesJS.load('particles', path);
    </script>

@endsection