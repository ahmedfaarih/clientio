@extends('layouts.app')

@section('title')
    User Details
@endsection


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
                       <th scope="row">User name</th>
                       <th scope="col"><p>{{$user->name}}</p></th>
                   </tr>
                   <tr>
                       <th scope="row">Client ID</th>
                       <th scope="col"><p>{{$user->client_id}}</p></th>
                   </tr>

                   <tr>
                       <th scope="row">User email</th>
                       <th scope="col"><p>{{$user->email}}</p></th>
                   </tr>

                   <tr>
                       @foreach($cases as  $case)
                       <th scope="row">User case type</th>
                       <th scope="col">{{$case->type}}</th>
                       @endforeach
                   </tr>
                   </tbody>
               </table>
           </div>
       </div>
   </div>

@endsection

