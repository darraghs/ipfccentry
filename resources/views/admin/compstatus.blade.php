@extends('layouts.app')

@section('content')
    @inject('compstatus', 'App\Http\Controllers\ClubEntryController')
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
                        <td></td>
                    </tr>

                    @foreach ($statuses as $status)
                        <tr>
                            <td class="col-sm-4 col-md-2">{{ $status->status }}</td>

                            <td class="col-sm-4 col-md-2 col-md-push-2">{{ Form::radio('current', $status->id, $status->current) }} </td>
                            <td></td>


                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            {{ Form::submit('Set Status') }}
                        </td>
                    </tr>

                    <tr>
                        <td> @if( (strcmp($compstatus->getCurrentStatus() ,'comments')== 0 || strcmp($compstatus->getCurrentStatus() ,'finished')== 0 ) && $status->id>4 )
                                <a href="{{ url('pdf/commentsPDF') }}">Comments PDF</a>
                            @endif</td>
                        <td>@if( strcmp($compstatus->getCurrentStatus() ,'finished')== 0 || strcmp($compstatus->getCurrentStatus() ,'comments')== 0  )
                                <a href="{{ url('pdf/awardsPDF') }}">Awards PDF</a>
                            @endif</td>
                        <td></td>
                    </tr>


                </table>
                {!! Form::close() !!}

            </div>

        </div>
    </div>
@endsection
