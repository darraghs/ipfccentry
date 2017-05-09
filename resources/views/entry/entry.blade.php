@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">Club Entry</div>

            <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('entrycreate') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('club') ? ' has-error' : '' }}">
                        <label for="club" class="col-md-4 control-label">Club Name:</label>

                        <div class="col-md-6">
                            {{ $club }}
                            {{ Form::hidden('club_id', $clubid) }}

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('panels') ? ' has-error' : '' }}">
                        <label for="panels" class="col-md-4 control-label">Panels:</label>

                        <div class="col-md-6">
                            {!! Form::radio('panels', 'Both', true); !!}Both
                            {!! Form::radio('panels', 'Mono Only'); !!} Mono Only
                            {!! Form::radio('panels', 'Colour Only'); !!} Colour Only
                            @if ($errors->has('panels'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('panels') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>
@endsection
