@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="card-header mb-5 text-left">Hello Admin</h4>
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

                    {{ __('You are logged in') }} as @if(Auth::user()->isAdmin()) Administrator @else Enduser @endif

                    
                </div>

                <div class="container mb-5">
                        <div class="row">
                            <div class="col-md-12">
                            <button href="{{route('UserManager')}}" type="button" class="btn btn-primary btn-lg "><a class="text-white" href="/home/manageuser">User Management</a></button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
