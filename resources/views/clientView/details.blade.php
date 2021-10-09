@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.GoUserSidebar')

@section('title')
    User Details
@endsection
<style>
    th{
        font-size: 27px;
    }
</style>

@section('content')
   <div class="container card">
       <div class="row justify-content ">
           <div class="col-md-4 justify-content-end mt-5 ml-5">
               @if($user->gender =="MALE")
               <img style="height: 150px" src="{{asset('img/brand/pf.png')}}" alt="">
               @else
                   <img style="height: 150px" src="{{asset('img/brand/wf.png')}}" alt="">
               @endif
           </div>

           <div class="col-md-3  justify-content-center">
               <table class="table table">
                   <tbody>
                   <tr>
                       <th scope="row"><h4>User name</h4></th>
                       <th scope="col"><h4>{{$user->name}}</h4></th>
                   </tr>
                   <tr>
                       <th scope="row"><h4>Client ID</h4></th>
                       <th scope="col"><h4>{{$user->client_id}}</h4></th>
                   </tr>

                   <tr>
                       <th scope="row"><h4>User email</h4></th>
                       <th scope="col"><h4>{{$user->email}}</h4></th>
                   </tr>

                   <tr>
                       @foreach($cases as  $case)
                       <th scope="row"><h4>User case type</h4></th>
                       <th scope="col"><h4>{{$case->type}}</h4></th>
                       @endforeach
                   </tr>
                   </tbody>
               </table>
           </div>
       </div>
   </div>

@endsection

