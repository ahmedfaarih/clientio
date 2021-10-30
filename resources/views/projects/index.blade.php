@extends('layouts.app')

@section('title', 'Project Management')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text-success" aria-current="page">Project Management</li>
                    </ol>

                </nav>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4  class="pl-1">All Projects</h4>
            </div>

            <div class="col-md-6 text-right pl-3">
                <button class="p-2 mb-3"><a href={{route('projects.create')}}>Add a project</a></button>
            </div>
        </div>
    </div>

    @if($projects->count() < 0)
        <div class="container">
            <p>Sorry No Projects created</p>
        </div>
    @else


        <div class="container">

            <div class=""></div>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>

                    <th scope="col">Client</th>
                    <th scope="col ">Manage</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                @foreach($projects as $project)
                    <tbody>
                    <tr>

                        <td>{{$project->id}}</td>
                        <td><a href="{{route('projects.show', $project->id)}}">{{$project->title}}</a></td>

                        @foreach($users as $user)
                        @if($user->id == $project->user_id)
                        <td>{{$user->name}}</td>
                               @endif @endforeach
                        <th scope="row"><a class="btn btn-warning text-dark btn-outline" href=" {{ route('projects.edit', $project )}}" role="button">Edit</a></th>
                        <td scope="row">
                            <form action="{{ route('projects.destroy', $project->id)}} " class="form" role="form" method="POST">
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
