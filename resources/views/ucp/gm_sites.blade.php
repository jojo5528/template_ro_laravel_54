@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">Site</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - Site</h1></div>
                <div class="card-body">
                    <p>
                        <a href="{{route('manage.dashboard')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> DASHBOARD</a>
                    </p>
                    <hr class="border-dark">

                    <h2 class="text-info">SETUP INFORMATION</h2>
                    <div class="pl-md-5">
                        <p class="m-0">สามารถแก้ไขข้อมูลการติดตั้งเบื้องต้นได้ที่ ไฟล์ .env ใน root directory</p>
                    </div>
                    <hr>

                    <h2 class="text-primary">ASSETS</h2>
                    <div class="pl-md-5">
                        <h3>LOGO</h3>
                        <p class="m-0 pl-md-5">การแก้ไข LOGO สามารถนำไฟล์รูป ไปใส่ไว้ใน <b class="badge badge-danger">/public/images/</b> ได้เลย</p>
                        <p>และสามารถแก้ไขชื่อไฟล์ใน <b class="badge badge-danger">/config/app.php <i class="fas fa-angle-double-right"></i> logo</b> ได้เลย</p>
                        
                        <h3>FAV ICON</h3>
                        <p class="m-0 pl-md-5">
                            แนะนำให้แปลงรูปโดยใช้เว็บ
                            <a href="https://favicon.io/favicon-converter/" target="_blank" class="btn btn-dark btn-sm rounded-0"><i class="fas fa-link"></i> favicon.io</a>
                            จากนั้นดาวน์โหลดและแตกไฟล์นำมาทับของเดิมได้เลย ในโฟลเดอร์ <b class="badge badge-danger">/public/</b>
                        </p>
                        <p>และสามารถแก้ไข CODE เองได้ที่ <b class="badge badge-danger">/resources/views/layouts/header_seo.blade.php</b></p>
                    </div>
                    <hr>

                    <h2 class="text-primary">SERVICES</h2>
                    <div class="pl-md-5">
                        <h3>พบปัญหาหรือมีข้อสงสัยใดๆ สามารถติดต่อให้แก้ไขได้เลย ฟรี!!</h3>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
