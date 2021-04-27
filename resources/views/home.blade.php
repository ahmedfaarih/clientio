{{--@extends('layouts.app')

@section('content')--}}
@extends('layouts.dashboard')
@include('layouts.header')
@include('layouts.GoUserSidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in') }} as @if(Auth::user()->isAdmin()) Administrator :) @else   {{\Illuminate\Support\Facades\Auth::user()->name}}  @endif

                </div>

                <div class="col-md-12">
                    <a class="btn btn-primary mb-2" href="{{route('clinetUpdate', Auth:: User()->id)}}">View my case updates</a>
                    <a class="btn btn-primary mb-2" href="{{route('clinetDetails', Auth::User()->id)}}">View my case details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
