@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title',  '{{$publication->title}}')

@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{route('adminHome')}}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text" aria-current="page">Publications</li>
                        <li class="breadcrumb-item text-success" aria-current="page">{{$publication->title}}</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container card">
        <div class="row ">
            <div class=" pt-4 pr-4 pl-4  card-title col-md-4 thead-light">
                Publication information
            </div>
        </div>

        <div class=" row  pr-4 pl-3">
            <div class="col-md-6">
                <h2>Publication title: {{$publication->title}} </h2>
            </div>
            <div class="col-md-4">
                <h2>Publication type: {{$publication->type}}</h2>
            </div>
        </div>
        <div class="pt-2 col-md-12">
            <h2>Description</h2>
            <p>{{$publication->content}}</p>
        </div>

        <div class="pt-2 col-md-12">
            <h2>Status</h2>
            <p>{{$publication->status}}</p>
        </div>

        <div class="pt-2 col-md-12 p-4">
            <h2>Image</h2>
            <img src="/publicationImg/{{ $publication->img }}" width="400px">
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Created on</h4>
            <p>{{$publication->created_at}}</p>
        </div>
    </div>
    </div>



@endsection
