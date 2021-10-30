@extends('layouts.app')

@section('title')
    New Update
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a >Project Updates</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">New update</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    New Update
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
                    <form action="{{ route('updates.store') }}" method="POST">
                        {{csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Update Date:</strong>
                                    <input type="date" name="date" class="form-control" placeholder="date">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Remarks</strong>
                                    <input type="text" name="remarks" class="form-control" placeholder="Update description">
                                </div>
                            </div>




                            <div class="col-md-3  form-group">
                                <label class="form-control">Users </label>
                                <select name="project_id" class="form-control">
                                    @foreach($projects as $porject)
                                        <option value="{{$porject->id}}">{{   $porject->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3  form-group">
                                <label class="form-control">Project </label>
                                <select name="user_id" class="form-control">
                                    @foreach($projects as $porject)
                                        <option value="{{$porject->user_id}}">{{   $porject->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center p-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </nav>
    </div>
@endsection
