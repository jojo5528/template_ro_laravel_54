@extends('layouts.frontend_page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Download</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Download</h1></div>
                <div class="card-body">

                    <h2 class="text-center text-danger">แก้ไข CODE ได้ที่ resources/views/article_pages/</h2>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
