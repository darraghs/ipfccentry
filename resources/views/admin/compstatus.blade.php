@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                Competition Status
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'updateCompState']) !!}
                <table width="100%">
                    <tr>
                        <td class="col-sm-4 col-md-2">Status</td>
                        <td class="col-sm-4 col-md-2 col-md-push-2">Current</td>

                    </tr>

                    @foreach ($statuses as $status)
                        <tr>
                            <td class="col-sm-4 col-md-2">{{ $status->status }}</td>

                            <td class="col-sm-4 col-md-2 col-md-push-2">{{ Form::radio('current', $status->id, $status->current) }} </td>

                        </tr>
                    @endforeach
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td></td>
                       <td>
                        {{ Form::submit('Set Status') }}
                       </td>
                    </tr>

                </table>
                {!! Form::close() !!}

            </div>

        </div>
    </div>
@endsection
