@extends('layouts.frontend_page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact GM</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>ติดต่อ GM</h1></div>
                <div class="card-body">

                    <h2 class="text-center text-danger">..</h2>

				<center><a href="https://facebook.com/adminsureviptips"><img src="/public/images/facebook.png""></a><br>
				<a href="https://facebook.com/adminsureviptips"><font size="5" color="blue">https://facebook.com/adminsureviptips</font></a><br><br><br>
				<img src="/public/images/line.png"><br><br><font size="5" color="blue">Line Id : woero</font></center>
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
