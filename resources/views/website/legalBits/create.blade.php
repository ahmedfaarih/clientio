@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Create new legal bit
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('legalBits.index')}}>Website Management</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">Creating legal bits</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    Create New bit
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
                    <form action="{{ route('legalBits.store')}}" method="POST">
                        {{csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Legal bit title:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Link (Copy paste Link to video) :</strong>
                                    <input type="text" name="link" class="form-control" placeholder="Link">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center p-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </nav>
    </div>
@endsection
