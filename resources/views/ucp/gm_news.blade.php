@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">News</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - News</h1></div>
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

                    <h2 class="text-primary">IMAGE & TITLE NEWS</h2>
                    <div class="pl-md-5">
                        <h5 class="text-danger">แก้ไข CODE ได้ที่ resources/views/scripts/news.blade.php</h5>

                        <h3>NAME</h3>
                        <p class="m-0 pl-md-5">จะเป็นชื่อที่อ้างอิงถึงไฟล์ .blade.php ที่อยู่ในโฟลเดอร์<b class="badge badge-danger">resouces/views/article_news/</b></p>
                        <p>โดยแก้ไข name ให้ตรงตรามชื่อไฟล์(ไม่ต้องเอา .blade.php มา) <b class="badge badge-danger">ชื่อไฟล์</b>.blade.php</p>

                        <h3>IMAGE</h3>
                        <p class="m-0 pl-md-5">การแก้ไข IMAGE รูปที่แสดงข่าวในหน้าหลัก สามารถนำไฟล์รูป ไปใส่ไว้ใน <b class="badge badge-danger">/public/images/</b> แล้วอ้างอิงได้เลย</p>
                        <p>หรือสามารถนำรูปไปอัพโหลดขึ้นเว็บต่างๆ แล้วนำ url มาอ้างอิงได้เช่นกัน</p>
                        
                        <h3>TITLE</h3>
                        <p class="m-0 pl-md-5">หัวข้อที่จะแสดงในหน้าแรก สำหรับข่าวสารนั้นๆ สำหรับเนื้อบทความดูการแก้ไขด้านล่าง</p>

                        <h3>TYPE</h3>
                        <p class="m-0 pl-md-5">
                            ประเภทของข่าวสารแบ่งเป็น 3 ประเภท
                            <ol>
                                <li class="text-warning">NEWS</li>
                                <li class="text-success">EVENT</li>
                                <li class="text-primary">PROMOTION</li>
                            </ol>
                        </p>
                    </div>
                    <hr>

                    <h2 class="text-primary">NEWS ARTICLE</h2>
                    <div class="pl-md-5">
                        <h5 class="text-danger">แก้ไข CODE ได้ที่ resources/views/article_news/ชื่อไฟล์อ้างอิง.blade.php</h5>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
