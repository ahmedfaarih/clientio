@extends('layouts.dashboard')
@include('layouts.header')
@extends('layouts.sidebar')

@section('title')
    Legal Bots
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Following are the bots that'll apear in website/ Make sure to match size and design</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Bots.create') }}"> Create New Product</a>
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

                <td>
                    <form action="{{ route('Bots.destroy',$bot) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('Bots.show',$bot->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('Bots.edit',$bot->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $bots->links() !!}


@endsection
