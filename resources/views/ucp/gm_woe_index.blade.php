@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Manage</a></li>
                <li class="breadcrumb-item active">WOE Castle</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - WOE Castle</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{ route('manage.dashboard') }}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> DASHBOARD</a>
                        </div>
                        <div class="col text-right">
                            <form action="{{route('manage.woe.truncate')}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i> RESET</button>
                                <a href="{{ route('manage.woe.create' )}}" class="btn btn-lg btn-primary">CREATE <i class="fas fa-plus"></i></a>
                            </form>
                        </div>
                    </div>
                    <hr>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h5 class="text-danger">ชื่อปราสาทใช้แสดงผลใน WOE REPORT เท่านั้น (แนะนำให้แก้ชื่อให้ตรง castle-db ของท่าน และแก้เฉพาะบ้านที่วอก็เพียงพอ)</h5>
                    <hr>
                    
                    <div>
                        {{$woe->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white py-3 mt-5 shadow">
    <h1 class="text-center">DATA</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>CASTLE_ID</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @forelse($woe as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->castle_id}}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('manage.woe.show', $row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('manage.woe.edit', $row->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button @click="Delete({{json_encode(route('manage.woe.destroy',$row->id))}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4" class="text-danger text-center"><h3>NO DATA NOW.</h3></th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
