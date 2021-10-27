@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h6>Welcome to clientio</h6>
                <p>Youre logged in as a {{auth()->user()->type}}</p>
            </div>
        </div>
    </div>
@endsection
