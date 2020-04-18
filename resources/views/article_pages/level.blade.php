@extends('layouts.frontend_page')

@section('content')

@php
    $count_start = 1;
@endphp

<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Level</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h1>จัดอันดับ Level อาชีพ {{ $char[0]->classname() }}</h1>
                    <h3 class="p-0">จำนวน <b class="badge badge-primary">{{ $char->count() }}</b> คน</h3>
                    <p class="text-center">
                        <a href="{{ route('page', 'level/0') }}" class="btn btn-primary"><i class="fas fa-baby"></i> NOVICE</a>
                        <a href="{{ route('page', 'level/1') }}" class="btn btn-primary"><i class="fas fa-sword"></i> SWORDMAN</a>
                        <a href="{{ route('page', 'level/2') }}" class="btn btn-primary"><i class="fas fa-hat-witch"></i> MAGICIAN</a>
                        <a href="{{ route('page', 'level/3') }}" class="btn btn-primary"><i class="fas fa-bow-arrow"></i> ARCHER</a>
                        <a href="{{ route('page', 'level/4') }}" class="btn btn-primary"><i class="fas fa-hands"></i> ACOLYTE</a>
                        <a href="{{ route('page', 'level/5') }}" class="btn btn-primary"><i class="fas fa-sack-dollar"></i> MERCHANT</a>
                        <a href="{{ route('page', 'level/6') }}" class="btn btn-primary"><i class="fas fa-user-ninja"></i> THIEF</a>
                    </p>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>อันดับ</th>
                                <th>ตัวละคร</th>
                                <th>อาชีพ</th>
                                <th>เลเวล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($char))
                                @forelse ($char as $c)
                                    <tr>
                                        <th>{{ $count_start++ }}</th>
                                        <th>{{ $c->name }}</th>
                                        <th>{{ $c->classname() }}</th>
                                        <th>{{ $c->base_level }}</th>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3" class="text-center text-danger"><b>ขณะนี้ยังไม่มีข้อมูล</b></th>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <th colspan="3" class="text-center text-danger"><b>ขณะนี้ยังไม่มีข้อมูล</b></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
