@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Legal Bots
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 " >
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item text-success" aria-current="page">Publications Management</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Following are the bots that'll apear in website/ Make sure to match size and design</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('Bots.create') }}"> Create </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($bots as $bot)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{{ $bot->image }}" width="100px"></td>
                <td>{{ $bot->name }}</td>
                <td>{{ $bot->details }}</td>

                {{--<td>
                    <form action="{{ route('Bots.destroy',$bot->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE" />
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>--}}

                <td scope="row">
                    <form action="{{ route('Bots.destroy',$bot->id) }} " class="form" role="form" method="POST">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field()}}
                        <input class="btn btn-danger" type="submit" value="Delete" >
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $bots->links() !!}


@endsection
