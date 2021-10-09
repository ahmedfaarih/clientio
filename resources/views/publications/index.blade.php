@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Blogs management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text-success" aria-current="page">Blogs Management</li>
                    </ol>
                </nav>
            </div>
        </div>
        <button  type="button" class="btn btn-success mb-4"><a href="{{route('publications.create')}}">Create</a></button>
    </div>

    @if($publications->count()<0)
    <div class="container">
    <h2>No pulications available</h2>
    </div>

    @else

    <div class="container ">
        <div class="row ">

                @foreach($publications as $publication)
                <div class="col-md-4">
                            <img class="rounded-circle" src="/publicationImg/{{ $publication->img }}" alt="Generic placeholder image" width="140" height="140">
                            <h5 class="pt-4"><a href="{{route('publications.show', $publication->id)}}">{{$publication->title}}</a>   </h5>
                             <p><a class="btn btn-primary " href="{{route('publications.edit', $publication->id)}}" role="button">Edit &raquo;</a></p>
                             <form action="{{ route('publications.destroy', $publication->id)}} " class="form" role="form" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field()}}
                            <input class="btn btn-danger" type="submit" value="Delete" >
                        </form>
                        </div><!-- /.col-lg-4 -->
                @endforeach
                    <!-- /.row -->

        </div>
    </div
    @endif

@endsection

<td scope="row">

</td>
