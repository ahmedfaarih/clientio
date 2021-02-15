@extends('layouts.app')
@section('title')
User Management
@endsection
@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="#">Home</a></li>
    <li class="breadcrumb-item text-success" aria-current="page">User Management</li>
  </ol>
</nav>
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
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
@endif
@endsection