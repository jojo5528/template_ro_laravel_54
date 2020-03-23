@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.index')}}">WOE Castle</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.show', $woe->id)}}">{{$woe->id}}</a></li>
                <li class="breadcrumb-item active">EDIT</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>WOE #{{$woe->id}} - Castle #{{$woe->castle_id}} EDIT</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.woe.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Castle</a>
                        </div>
                        <div class="col text-right">
                            <form action="{{route('manage.woe.destroy', $woe->id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('manage.woe.show', $woe->id)}}" class="btn btn-lg btn-info"><i class="fas fa-eye"></i> VIEW</a>
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

                    <form method="POST" action="{{route('manage.woe.update', $woe->id)}}" autocomplete="off">
                        {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">ID</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$woe->id}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">CASTLE_ID</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="castle_id" required min="0" placeholder="CASTLE_ID" value="{{$woe->castle_id}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">NAME</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" required placeholder="NAME" value="{{$woe->name}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0 align-items-center">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-paper-plane"></i> CHANGE</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
