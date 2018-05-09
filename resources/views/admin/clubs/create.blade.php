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

                    <h1>Create a club</h1>
                    {{ Form::open(array('url' => 'clubs')) }}

                    <div class="form-group">
                        {{ Form::label('clubname', 'Name') }}
                        <input id="clubname" type="text" class="form-control" name="clubname"
                               value="{{ old('clubname') }}" required autofocus>

                    </div>

                    {{ Form::submit('Create the club!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                </div>

            </div>
        @endif
    </div>
@endsection
