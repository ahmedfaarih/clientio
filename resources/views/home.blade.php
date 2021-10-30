{{--@extends('layouts.app')

@section('content')--}}
@extends('layouts.app')
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
