@extends('layouts.dashboard')
@include('layouts.GoUserSidebar')
@include('layouts.header')

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 text-right">
                <div class="">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                       {{-- <div class="text-right">

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
--}}

                    <table class="table caption-top table-bordered border-primary">

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Ahmed</td>
                            <td>Faarih</td>
                            <td>ahmed.faarih@outlook.com</td>
                        </tr>

                        </tbody>
                    </table>

                <div class="container pt-2 border-primary">
                    <div class="row border-primary">
                        <div class="col-md-3 text-left">
                            <h2>Case name</h2>
                            <h4>Ahmed Faarih Vs Maldives Mago company</h4>
                        </div>
                        <div class="col-md-7 text-left">
                            <h2>Case detail</h2>
                            <h6>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</h6>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

