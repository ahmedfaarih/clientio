{{--@extends('layouts.app')

@section('content')--}}
@extends('layouts.dashboard')
@include('layouts.GoUserSidebar')
@include('layouts.header')

@section('content')
    <div class="">
        <div class="row ">
            <div class="col-md-12 text-right">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                </div>

                <div class="col-md-12 text-left">
                    <h2>Please upload the requested files</h2>

                    @foreach($clientRequests as $request)
                        <div class="row d-flex justify-content-center mt-100">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{$request->title}}</h5>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('updateDocumentRequest', $request->id) }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class=" m-5 form-group">
                                                    <input  type="hiddn" name="request_staus" class="form-control hidden" data-value="1">
                                                    <input type="file" name="file_path" class="form-control" placeholder="file">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
