@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">TMPAY - Truemoney LOG</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>TMPAY - Truemoney LOG</h1></div>
                <div class="card-body">
                    {{-- REFILL HISTORY --}}
                    {{$history->links('layouts.pagination')}}

                    <table class="table table-hover table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#REF CARD_ID</th>
                                <th>รหัสบัตร</th>
                                <th>ราคา</th>
                                <th>สถานะ</th>
                                <th>ทำรายการเมื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($history as $item)
                                <tr>
                                    <th>#{{$item->card_id}}</th>
                                    <td>{{$item->password}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{!! (array_key_exists($item->status, $status_data)) ? $status_data[$item->status] : "<b class='badge badge-pill badge-danger'>สถานะผิดพลาด</b>" !!}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->added_time)->toDayDateTimeString()}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5"><h3 class="text-danger">ขณะนี้ยังไม่มีประวัติการเติมเงินด้วยบัตรทรูมันนี่</h3></th>
                                </tr>
                            @endforelse
                            <tr></tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
