@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')


@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('updates.index')}}>Manage Updates</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">Edit Update</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    <h2>Edit Update</h2>
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
                    <form action="{{ route('updates.update', $update->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Update Date:</strong>
                                    <input value="{{$update->date}}" type="date" name="date" class="form-control" placeholder="Project title">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Remarks</strong>
                                    <input value="{{$update->remarks}}" type="text" name="remarks" class="form-control" placeholder="Update description">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </nav>
    </div>
@endsection
