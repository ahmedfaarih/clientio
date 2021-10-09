@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    New publication
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('publications.index')}}>Publication Management</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">New publication</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    <h2>  New Publication</h2>
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
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Publication title:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Publication title">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Publication content</label>
                                    <textarea placeholder="content" type="text" name="content" class="form-control" id="description" rows="20"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3  form-group">
                                <label class="form-control">Written by </label>
                                <select name="user_id" class="form-control">
                                        <option value=" {{ Auth::user()->id }}"> {{ Auth::user()->name }}</option>
                                </select>
                            </div>

                            <div class=" col-md-5">
                                <label class="form-group col-md-5 " for="pet-select">Publication status:</label>
                                <select class="form-control" name="status" id="type-select">
                                    <option value="Pending">Pending</option>
                                    <option value="Publish">Publish</option>
                                </select>
                            </div>

                            <div class=" col-md-12">
                                <div class="form-group">
                                    <strong>Add a tag:</strong>
                                    <input type="text" name="tags" class="form-control" placeholder="Tag">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="img" class="form-control" placeholder="Image">
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
