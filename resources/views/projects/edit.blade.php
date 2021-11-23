@extends('layouts.app')



@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item text-success" aria-current="page"><a href={{route('projects.index')}}>Project Management</a></li>
                <li class="breadcrumb-item text-success" aria-current="page">Updating Project</li>
            </ol>

            <div class="card uper">
                <div class="card-header">
                    <h2>Update Prjoect</h2>
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
                    <form action="{{ route('projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Project title:</strong>
                                    <input value="{{$project->title}}" type="text" name="title" class="form-control" placeholder="Project title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label class="form-group col-md-3 " for="pet-select">Choose project Type:</label>

                                <select data-value="{{$project->type}}" class="form-control" name="type" id="type-select">
                                    <option value="Legal Drafting">Legal Drafting</option>
                                    <option value="Contract/Agreement Reviewing">Contract/Agreement Reviewing</option>
                                    <option value="Litigation">Litigation</option>
                                    <option value="Compliance">Compliance</option>
                                    <option value="Business Incorporation">Business Incorporation</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Project description</label>
                                    <textarea  placeholder="Description" type="text" name="description" class="form-control" id="description" rows="5">{{$project->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-3  form-group">
                                <label class="form-control">Client </label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{   $user->name}}</option>
                                    @endforeach
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
