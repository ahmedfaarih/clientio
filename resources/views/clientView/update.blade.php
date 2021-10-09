@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.GoUserSidebar')

@section('title')
    Case Updates
@endsection

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <table class="table">
                    <thead>
                    <tr >
                        <th scope="col font-weight-bold">Date</th>
                        <th scope="col font-weight-bold">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($updates as $update)
                        <tr>
                            <th scope="row">{{$update->date}}</th>
                            <td>{{$update->remarks}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

