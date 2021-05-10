@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Legal Bits
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text-success" aria-current="page">Website Management</li>
                    </ol>

                </nav>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4  class="pl-1">All Bits</h4>
                <a class="btn btn-default" href="{{route('legalBits.create')}}">Add a new bit</a>
            </div>


        </div>
    </div>

    @if($legalBits->count() ==0)
        <div class="container">
            <p>Sorry No bits created</p>

        </div>
    @else


        <div class="container">

            <div class=""></div>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Video</th>

                </tr>
                </thead>
                @foreach($legalBits as $bit)
                    <tbody>
                    <tr>

                        <td>{{$bit->id}}</td>
                        <td>{{$bit->title}}</td>
                       <td>
                           <iframe width="300" height="150" src="https://www.youtube.com/embed/{{$bit->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </td>

                        <td scope="row">
                            <form action="{{ route('legalBits.destroy', $bit->id)}} " class="form" role="form" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field()}}
                                <input class="btn btn-danger" type="submit" value="Delete" >
                            </form>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    @endif
@endsection
