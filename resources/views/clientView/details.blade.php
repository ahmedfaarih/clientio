@extends('layouts.app')

@section('title')
    User Details
@endsection


@section('content')
   <div class="container ">
       <div class="row mt-2 d-flex justify-content-center">
           <div class=" col-md-3 card ml-4">
               @if($user->gender =="MALE")
               <img class="p-3" style=" height:200px;" src="{{asset('img/brand/pf.png')}}" alt="">
               @else
                   <img style="with: 150px" src="{{asset('img/brand/wf.png')}}" alt="">
               @endif
           </div>
           <div class="col-md-5">
               <div class="card p-3">
                   <div class="card-body">
                       @foreach($cases as  $case)
                           <h6 class="text-muted">User Name: <span class="text-bold">{{$user->name}}</span> </h6>
                           <h6 class="text-muted">Client ID: <span class="text-bold">{{$user->client_id}}</span> </h6>
                           <h6 class="text-muted">User Email: <span class="text-bold">{{$user->email}}</span> </h6>
                           <h6 class="text-muted">User Name: <span class="text-bold">{{$user->name}}</span> </h6>
                           <h6 class="text-muted">User case type: <span class="text-bold">{{$case->type}}</span></h6>
                       @endforeach
                   </div>
               </div>
           </div>

       </div>
   </div>


@endsection

