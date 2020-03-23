@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.index')}}">WOE Castle</a></li>
                <li class="breadcrumb-item active">{{$woe->id}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>WOE #{{$woe->id}} - Castle #{{$woe->castle_id}} View</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.woe.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Castle</a>
                        </div>
                        <div class="col text-right">
                            <form action="{{route('manage.woe.destroy', $woe->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('manage.woe.edit', $woe->id)}}" class="btn btn-lg btn-success"><i class="fas fa-edit"></i> EDIT</a>
                                <button type="submit" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
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

                    <table class="table table-sm table-bordered table-hover table-striped">
                        <tbody class="text-left">
                            <tr>
                                <th class="bg-primary">ID</th>
                                <td>{{$woe->id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">CASTLE_ID</th>
                                <td>{{$woe->castle_id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">NAME</th>
                                <td>{{$woe->name}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
