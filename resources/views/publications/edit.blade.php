@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')


@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('publications.index')}}>Project Management</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">Updating Publication</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    <h2>Update Publication</h2>
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
                    <form action="{{ route('publications.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Publications title:</strong>
                                    <input value="{{$publication->title}}" type="text" name="title" class="form-control" placeholder="Project title">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label class="form-group col-md-3 " for="pet-select">Publication status:</label>

                                <select class="form-control" name="status" id="type-select">
                                    <option value="Pending">Pending</option>
                                    <option value="Publish">Publish</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label class="form-group col-md-3 " for="pet-select">Publication type:</label>
                                <select data-value="{{$publication->status}}" class="form-control" name="type" id="type-select">
                                    <option value="News letter">News letter</option>
                                    <option value="Blogs">Blogs</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Publication content</label>
                                    <textarea  placeholder="content" type="text" name="content" class="form-control" id="content" rows="20">{{$publication->content}}</textarea>
                                </div>
                            </div>

                            <div class=" col-md-12">
                                <div class="form-group">
                                    <strong>Tag:</strong>
                                    <input value="{{$publication->tags}}" type="text" name="tags" class="form-control" placeholder="{{$publication->tag}}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input value="{{$publication->img}}" type="file" name="img"class="form-control" placeholder="Upload Image">
                                </div>
                            </div>

                            <input value="{{$publication->user_id}}" type="hidden" name="user_id" class="form-control" placeholder="{{$publication->img}}">

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
