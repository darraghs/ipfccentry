@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                Administer Clubs
            </div>

            <div class="panel-body">
                <nav class="navbar navbar-inverse">

                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('clubs') }}">View All clubs</a></li>
                        <li><a href="{{ URL::to('clubs/create') }}">Create a Club</a>
                    </ul>
                </nav>

                <h1>All the clubs</h1>

                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Club Name</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clubs as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->clubname }}</td>

                            <!-- we will also add show, edit, and delete buttons -->
                            <td>

                                <!-- delete the Club (uses the destroy method DESTROY /clubs/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->

                            {{ Form::open(array('url' => 'clubs/' . $value->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete Club', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}

                            <!-- edit this Club (uses the edit method found at GET /clubs/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('clubs/' . $value->id . '/edit') }}">Edit
                                    Club</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
