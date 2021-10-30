{{--@extends('layouts.app')

@section('content')--}}
@extends('layouts.app')

@section('title')
    Document requests
@endsection

<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

@section('content')
    <div class="">
        <div class="row ">
            <div class="col-md-12 text-right">

                @if($clientRequests->count() <= 0)
                <div class="col-md-12 d-flex justify-content-center text-center ">
                    <div class="card bg-success">
                    <h4 class="card-body">You do not have pending requests!</h4>
                    </div>
                </div>
                @else
                <div class="col-md-12 text-center">

                    @foreach($clientRequests as $request)
                        <div class="row d-flex justify-content-center mt-100">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{$request->title}}</h3>
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
                                        <div class="row d-flex align-content-center">

                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <div class="fileUpload btn btn-secondary">
                                                    <span>Select file (Multiple files can be uploaded)</span>
                                                    <input multiple="" id="file" type="file" class="upload" name="file[]"    onchange="javascript:updateList()"  />
                                                </div>
                                                <div id="fileList"></div>
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
                @endif

            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        updateList = function() {
            var input = document.getElementById('file');
            var output = document.getElementById('fileList');
            var children = "";
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li style="list-style-type: none;">' + input.files.item(i).name + '</li>';
            }
            output.innerHTML = '<ul>'+children+'</ul>';


        }
    </script>
@endsection


