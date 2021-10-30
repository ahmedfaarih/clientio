@extends('layouts.app')

@section('title')
    Creating Users
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('users.index')}}>User Management</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">Updating User Details</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    Update User
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
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>User Name:</strong>
                                    <input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="User Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input value="{{$user->email}}" type="text" name="email" class="form-control" placeholder="User Email">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Client ID:</strong>
                                    <input value="{{$user->client_id}}" type="text" name="client_id" class="form-control" placeholder="User Client">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="pet-select">Choose User Type:</label>

                                <select name="type" id="type-select" value="{{$user->type}}">
                                    <option value="GOUSER">Normal User</option>
                                    <option value="ADMIN">ADMIN</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="pet-select">Choose User Gender:</label>

                                <select name="gender" id="type-select" value="{{$user->gender}}">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
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
