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
                <li class="breadcrumb-item text-success" aria-current="page">Creating User</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    Create New User
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
                        <form action="{{ route('users.store') }}" method="POST">
                            {{csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>User Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="User Email">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" class="form-control" placeholder="User password">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <select class="form-control" name="type" id="type-select">
                                        <option value="GOUSER">Normal User</option>
                                        <option value="ADMIN">ADMIN</option>

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
