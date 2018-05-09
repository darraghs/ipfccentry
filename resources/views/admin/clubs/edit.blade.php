@extends('layouts.app')

@section('content')
    <div class="container">
        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    Administer Clubs
                </div>
                <div class="panel-body">
                    <nav class="navbar navbar-inverse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ URL::to('clubs') }}">View All clubs</a></li>
                            <li><a href="{{ URL::to('clubs/create') }}">Create a club</a>
                        </ul>
                    </nav>

                    <h1>Edit {{ $club->clubname }}</h1>


                    {{ Form::model($club, array('route' => array('clubs.update', $club->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('clubname', 'Name') }}
                        {{ Form::text('clubname', null, array('class' => 'form-control')) }}
                    </div>

                    {{ Form::submit('Edit the club!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>

            </div>
        @endif
    </div>
@endsection
