@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('content')
<div class="container m5 p5">
    {{ __('You are logged in') }} as @if(Auth::user()->isAdmin()) Administrator @else Enduser @endif
</div>
@endsection
