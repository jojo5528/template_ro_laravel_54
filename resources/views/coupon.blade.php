@extends('layouts.frontend_page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Secret Coupon</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Secret Coupon</h1></div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h3 class="text-center">ผิดพลาด !</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div id="alert_notify" class="alert alert-dismissible alert-primary d-none">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="m-0 p-0" id="alert_message">msg</p>
                    </div>

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center bg-warning">
                                <th>CODE</th>
                                <th>ITEM_ID</th>
                                <th>ITEM_AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count_item = 1; @endphp
                            @if(!empty($coupon))
                                @forelse($coupon as $i)
                                    <tr>
                                        <td>
                                            <code class="text-white bg-danger px-3 py-1 font-weight-bolder" onclick="clibboard({{$count_item}})">{{$i->code}}</code>
                                            <button onclick="clibboard({{$count_item}})" class="btn btn-dark btn-sm"><i class="fas fa-copy"></i></button>
                                            <p class="p-0 m-0">
                                                <small class="text-danger">*คลิกที่ปุ่มหรือรหัสเพื่อ Copy</small>
                                                <input id="code_{{$count_item}}" type="hidden" value="{{$i->code}}">
                                            </p>
                                        </td>
                                        <td class="text-center">{{$i->item_id}}</td>
                                        <td class="text-center">{{$i->item_amount}}</td>
                                    </tr>
                                    @php $count_item++; @endphp
                                @empty
                                    <tr class="text-center text-danger">
                                        <th colspan="3">ขณะนี้ยังไม่มีข้อมูลคูปอง</th>
                                    </tr>
                                @endforelse
                            @else
                                <tr class="text-center text-danger">
                                    <th colspan="3">ขณะนี้ยังไม่มีข้อมูลคูปอง</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
function clibboard(count_item){
    //element
    var ele_copy = document.getElementById('code_'+count_item);
    var ele_alert_box = document.getElementById('alert_notify');
    var ele_alert_text = document.getElementById('alert_message');

    //copy
    ele_copy.select();
    document.execCommand("copy");
    notify(ele_copy.value);
}
function notify(message){
    //element
    var ele_alert_box = document.getElementById('alert_notify');
    var ele_alert_text = document.getElementById('alert_message');

    ele_alert_box.className = ele_alert_box.className.replace("d-block", "d-none");

    //show notify
    ele_alert_text.innerHTML = "<a href='#!' class='alert-link'>Copied: "+ message +"</a>";

    ele_alert_box.className = ele_alert_box.className.replace("d-none", "d-block");
    setTimeout(function(){ ele_alert_box.className = ele_alert_box.className.replace("d-block", "d-none"); }, 3000);
}
</script>
@endsection
