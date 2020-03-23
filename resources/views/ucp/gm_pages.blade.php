@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">Pages</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - Pages</h1></div>
                <div class="card-body">
                    <p>
                        <a href="{{route('manage.dashboard')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> DASHBOARD</a>
                    </p>
                    <hr class="border-dark">

                    <h2 class="text-info">BLADE TEMPLATE</h2>
                    <div class="pl-md-5">
                        <p class="m-0">คือ โครงสร้างภาษา Blade PHP ของ Laravel Framework ที่มีความสามารถ(function) render PHP และ HTML ที่ใช้ใน Laravel Framework</p>
                    </div>
                    <hr>

                    <h2 class="text-primary">PAGES ARTICLE</h2>
                    <div class="pl-md-5">
                        <h5 class="text-danger">แก้ไข CODE ได้ที่ resources/views/article_pages/ชื่อไฟล์อ้างอิง.blade.php</h5>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
