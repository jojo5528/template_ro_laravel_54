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
                <li class="breadcrumb-item active">Zeny</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>จัดอันดับ Zeny</h1></div>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>อันดับ</th>
                                <th>ตัวละคร</th>
                                <th>Zeny</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($char))
                                @forelse ($char as $c)
                                    <tr>
                                        <th>{{ $count_start++ }}</th>
                                        <th>{{ $c->name }}</th>
                                        <th>{{ $c->zeny }}</th>
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
