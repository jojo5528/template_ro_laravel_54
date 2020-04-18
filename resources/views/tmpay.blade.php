@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">UCP</a></li>
                <li class="breadcrumb-item active">TMPAY - Truemoney</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>TMPAY - Truemoney</h1></div>
                <div class="card-body">
                    
                    {{-- CONTENT --}}
                    <h2>Username: <small class="text-muted">{{Auth::user()->userid}}</small></h2>
                    <hr>

                    <h4 class="text-danger">*คำแนะนำ</h4>
                    <ol>
                        <li>เฉพาะบัตรทรูมันนี่เท่านั้น <b class="text-danger"><u>บัตรทรูมูฟไม่สามารถใช้ได้</u></b></li>
                        <li>Cash จะเข้าสู่ตัวละครของท่านทันที หลังจากระบบอนุมัติ <b class="text-danger"><u>(ไม่จำเป็นต้องออกจากเกม)</u></b></li>
                        <li>ใช้เวลาตรวจสอบประมาณ <b class="text-danger"><u>1-10 นาที</u></b></li>
                        <li>หากเกิดข้อผิดพลาดใดๆ กรุณาแจ้งเจ้าหน้าที่</li>
                    </ol>

                    {{-- ERROR --}}
                    @if($errors->has('error'))
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            <strong>ผิดพลาด!</strong> {{$errors->first()}}.
                        </div>
                    @endif
                    @if($errors->has('success'))
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                            <strong>สำเร็จ!</strong> {{$errors->first()}}.
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form action="{{ route('user.tmpay_post') }}" method="post" class="text-center">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group text-center {{($errors->has('error'))?'has-error':''}}">
                                <h5>เลขบัตรเงินสดทรูมันนี่ 14 หลัก</h5>
                                <input name="truemoney_password" type="text" class="form-control form-control-lg text-center {{($errors->has('error'))?'is-invalid':''}}" maxlength="14" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required>
                                @if($errors->has('error')) <div class="invalid-feedback">{{$errors->first()}}</div> @endif
                            </div>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fas fa-paper-plane"></i> เติมเงิน!</button>
                        </fieldset>
                    </form>

                    <hr class="border-dark">

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
