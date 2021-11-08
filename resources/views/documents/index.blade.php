@extends('layouts.app')
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('addFilestoProjects', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex align-content-center">

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="fileUpload btn btn-info">
                            <span class="p-3">Drag & Drop or select file (Multiple files can be uploaded)</span>
                            <span class="p-2"><i class="fab fa-dropbox"></i></span>
                            <input multiple="" id="file" type="file" class="upload" name="file[]"    onchange="javascript:updateList()"  />
                        </div>
                        <div id="fileList"></div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
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
