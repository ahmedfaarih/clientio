@extends('layouts.dashboard')
@include('layouts.GoUserSidebar')
@include('layouts.header')

@section('content')
    <div class="">
        <div class="row ">
            <div class="col-md-12 text-right">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="container card">
                        <div class="row ">
                            <div class=" pt-4 pr-4 pl-4  card-title col-md-4 thead-light">
                                User Details
                            </div>
                        </div>
                    </div>
                    <div class="text-right">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>

                                    </tr>

                                </tbody>
                            </table>
                    </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th scope="col">Case Name</th>
                                <th scope="col">Case Type</th>
                                <th scope="col">Case Details</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($cases as $case)
                                    <td>{{$case->title}}</td>
                                    <td>{{$case->type}}</td>
                                    <td>{{$case->description}}</td>
                                @endforeach
                            </tr>

                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

