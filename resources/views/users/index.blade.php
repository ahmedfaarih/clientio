@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
 User Management
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 " >
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item text-success" aria-current="page">User Management</li>
          </ol>

        </nav>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4  class="pl-1">All Users</h4>
        </div>


    </div>
</div>

@if($users->count() < 0)
<div class="container">
<p>Sorry No users created</p>
</div>
@else


<div class="container">

<div class=""></div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col ">Manage</th>
      <th scope="col"></th>
    </tr>
  </thead>
    @foreach($users as $user)
  <tbody>
    <tr>

      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->type}}</td>
      <th scope="row"><a class="btn btn-warning text-dark btn-outline" href="{{ route('users.edit', $user)}}" role="button">Edit</a></th>
        <td scope="row">
            <form action="{{ route('users.destroy', $user->id)}} " class="form" role="form" method="POST">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field()}}
                <input class="btn btn-danger" type="submit" value="Delete"  @if($user->hasCases($user->id)) disabled @endif>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endif
@endsection
