{{--@extends('layouts.app')

@section('content')--}}
@extends('layouts.dashboard')
@include('layouts.GoUserSidebar')
@include('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="container card">
                        <div class="row ">
                            <div class=" pt-4 pr-4 pl-4  card-title col-md-4 thead-light">
                                Project Updates
                            </div>
                        </div>
                    </div>

                    <div class="container">
                    @if($updates->count()<0)
                    <h2>No updates</h2>
                    @else
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($updates as $update)




                                <tr>
                                    <th scope="row">{{$update->id}}</th>
                                    <td>{{$update->date}}</td>
                                    <td>{{$update->remarks}}</td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @endif


                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
@endsection
