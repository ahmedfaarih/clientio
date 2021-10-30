@extends('layouts.app')
@section('title')
    New request for document
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href="#">Document requests</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">New request</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    <h2>  New Request</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif

                    <form action="" method="POST" enctype="multipart/form-data">
                        {{csrf_field() }}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="mb-4" >Request title:</strong>
                                <input  type="text" name="title" class="form-control" placeholder="Request title">

                            </div>
                        </div>

                        <div class="col-md-3  form-group">
                            <label class="form-control">Client </label>
                            <select name="user_id" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{   $user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </nav>
    </div>

    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ">RECENTLY UPLOADED BY CLIENTS</li>
        </ol>
        <div class="conatiner">
            <div class="row">
            @foreach($images as $image)
                <div class="col-md-4">
                <iframe src="/DocumentRequests/{{$image->file_path}}" width="200px" height="270px">
                </iframe>

                <form method="get" action="/DocumentRequests/{{$image->file_path}}">
                    <button type="submit">Download!</button>
                </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
