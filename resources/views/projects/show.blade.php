@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title',  '{{$project->title}}')

@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{route('adminHome')}}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text" aria-current="page">Project Management</li>
                        <li class="breadcrumb-item text-success" aria-current="page">{{$project->title}}</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container card">
        <div class="row ">
            <div class=" pt-4 pr-4 pl-4  card-title col-md-4 thead-light">
                Project Information
            </div>
        </div>

        <div class=" row  pr-4 pl-4   ">
            <div class="col-md-4">
                <h2>Project title: </h2>
                <h4> {{$project->title}}</h4>

            </div>
            <div class="col-md-4">
                <h2>Project type: </h2>
                <h4>{{$project->type}}</h4>
            </div>

            <div class="col-md-4">
                <h2>Client Name:  <i class="fas fa-user"></i></h2>
                @foreach($users as $user)
                    @if($project->user_id == $user->id)
                        <h4>  {{$user->name}}</h4>

                    @endif @endforeach
            </div>

            </div>
            <div class="pt-2 col-md-12">
                <h2>Description</h2>
                <p>{{$project->description}}</p>
            </div>

        </div>

        <div class="row">
        <div class="col-md-12">
            <h4>Created on</h4>
            <p>{{$project->created_at}}</p>
        </div>
        </div>
    </div>

    <div class="container card">
        <div class="row card-body">
            <div class="col-md-12">
                <h3>Latest updates of this project</h3>
                {{--@foreach($updates as $update)
                    @if($update->project_id == $project->id)
                <h4>{{$update->date}}</h4>
                <p>{{$update->remarks}}</p>
                <a class="btn btn-lg btn-primary" href="{{route('updates.index')}}">Show all updates of this project</a>
                <a class="btn btn-lg btn-success" action="GET" href="{{route('updates.create')}} ">Add new update</a>
                @endforeach--}}


                <table class="table table-striped">
                    <thead class="thead- text-dark ">
                    <tr>
                        <th scope="col  text-white"> Updated Date</th>
                        <th scope="col  text-white">Remarks</th>
                        <th scope="col  text-white">Manage</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($updates as $update)
                        @if($update->project_id == $project->id)
                    <tr>
                        <td>{{$update->date}}</td>
                        <td>{{$update->remarks}}</td>
                        <td class="btn btn-primary "><a class="text-white" href="{{route('updates.edit', $update->id)}}">Edit</a></td>

                        <td >
                            <form action="{{ route('updates.destroy', $update->id)}} " class="form" role="form" method="POST">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field()}}
                                <input class="btn btn-danger" type="submit" value="Delete" >
                            </form>
                        </td>
                    </tr>
                    </tbody>

                    @endif
                    @endforeach
                    <a class="btn btn-success mb-3" href="{{route('updates.create')}}">New update</a>
                   {{-- <a method="post" class="btn btn-success mb-3" href="{{route('updates.index',$update->project_id)}}">Show All update</a>--}}

                </table>
                        {{--<a class="btn btn-success" href="{{route('updates.create')}}">New update</a>
                        <a class="btn btn-success" href="{{route('updates.index',$)}}">Show All update</a>--}}
            </div>
        </div>
    </div>

@endsection
