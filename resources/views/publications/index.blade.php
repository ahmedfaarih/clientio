@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Publications management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text-success" aria-current="page">Publications Management</li>
                    </ol>
                </nav>
            </div>
        </div>
        <button  type="button" class="btn btn-success mb-4"><a href="{{route('publications.create')}}">Create</a></button>
    </div>

    @if($publications->count()<0)
    <div class="container">
    <h2>No pulications available</h2>
    </div>

    @else

    <div class="container card">
        <div class="row ">
            <table class="table table-striped">
                @foreach($publications as $publication)
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">{{$publication->id}}</th>
                    <td><a href="{{route('publications.show',$publication->id)}}">{{$publication->title}}</a></td>
                    <td>{{$publication->type}}</td>
                    <td>{{$publication->status}}</td>
                    <td><a class="btn btn-primary" href="{{route('publications.edit',$publication->id)}}">Edit</a></td>


                    <td scope="row">
                        <form action="{{ route('publications.destroy', $publication->id)}} " class="form" role="form" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field()}}
                            <input class="btn btn-danger" type="submit" value="Delete" >
                        </form>
                    </td>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @endif

@endsection
