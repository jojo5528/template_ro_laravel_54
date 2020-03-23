@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">UCP</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>UCP - Dashboard</h1></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-break text-wrap">
                            <h2>
                                Username:
                                <small class="text-muted">{{Auth::user()->userid}}</small>
                            </h2>
                            <h2>
                                Status:
                                <small class="text-muted">
                                    @if(Auth::user()->isGM())
                                        <b class="badge badge-pill badge-danger">GM</b>
                                    @else
                                        <b class="badge badge-pill badge-success">PLAYER</b>
                                    @endif
                                </small>
                            </h2>
                            <h3>
                                Email:
                                <small class="text-muted">
                                    @if(!empty(Auth::user()->email))
                                        {{Auth::user()->email}}
                                    @else
                                        ไม่ระบุ
                                    @endif
                                </small>
                            </h3>
                            <h3>
                                BirthDate:
                                <small class="text-muted">
                                    @if(!empty(Auth::user()->birthdate))
                                        {{Auth::user()->birthdate}}
                                    @else
                                        ไม่ระบุ
                                    @endif
                                </small>
                            </h3>
                            <h4>Last Login: <small class="text-muted">{{Auth::user()->lastlogin}}</small></h4>
                            <h4>Last IP: <small class="text-muted">{{Auth::user()->last_ip}}</small></h4>
                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <div class="col text-center">
                            <h2>MANAGEMENT - จัดการบัญชี</h2>
                            <a href="{{route('user.changepassword')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3"><i class="fas fa-user-edit fa-2x"></i> CHANGE PASSWORD</a>
                            <a href="{{route('user.changemail')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3"><i class="fas fa-user-edit fa-2x"></i> CHANGE EMAIL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
