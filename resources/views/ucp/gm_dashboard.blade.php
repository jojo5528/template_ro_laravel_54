@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - Dashboard</h1></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-break text-wrap">
                            <h2>
                                All ID:
                                <small class="text-muted">{{$count['user']}}</small>
                            </h2>
                            <a href="{{route('manage.guide')}}" class="btn btn-lg btn-block btn-info rounded-pill py-3"><i class="fas fa-question-circle fa-2x"></i> GUIDE</a>
                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <div class="col text-center">
                            <h2>MANAGEMENT - จัดการเว็บไซต์</h2>
                            <a href="{{route('manage.news')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3">
                                <i class="fas fa-edit fa-2x"></i> NEWS ARTICLE
                            </a>
                            <a href="{{route('manage.page')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3">
                                <i class="fas fa-edit fa-2x"></i> PAGES ARTICLE
                            </a>
                            <a href="{{route('manage.site')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3">
                                <i class="fas fa-wrench fa-2x"></i> SITE CONFIG
                            </a>
                            <a href="{{route('manage.woe.index')}}" class="btn btn-lg btn-block btn-warning rounded-pill py-3">
                                <i class="fas fa-wrench fa-2x"></i> WOE SETTING
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
