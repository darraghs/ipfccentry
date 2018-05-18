@extends('layouts.app')

@section('content')
    @inject('compstatus', 'App\Http\Controllers\ClubEntryController')
    <div class="container">
        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    Competition Status
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'updateCompState']) !!}
                    <table style="border-collapse: unset; border-spacing: 10px;">
                        <tr>
                            <th class="col-sm-4 col-md-2">Status</th>
                            <th class="col-sm-4 col-md-2 col-md-push-2">Current</th>
                            <th>Scoring Sheets</th>
                            <th>Scoring Sheets</th>
                            <th>Scoring Sheets</th>
                        </tr>

                        @foreach ($statuses as $status)
                            <tr>
                                <td class="col-sm-4 col-md-2">{{ $status->status }}</td>

                                <td class="col-sm-4 col-md-2 col-md-push-2">{{ Form::radio('current', $status->id, $status->current) }} </td>

                                @if($status->id == 3 && $compstatus->getCurrentStatusFull()['id'] > 1 && $compstatus->getCurrentStatusFull()['id'] < 5  )
                                    <td><a href="{{url('admin/scoringSheets/mono/1')}}">Mono Judge 1</a></td>
                                    <td><a href="{{url('admin/scoringSheets/mono/2')}}">Mono Judge 2</a></td>
                                    <td><a href="{{url('admin/scoringSheets/mono/3')}}">Mono Judge 3</a></td>
                                    @elseif($status->id == 4 && $compstatus->getCurrentStatusFull()['id'] > 1 && $compstatus->getCurrentStatusFull()['id'] < 5)
                                    <td><a href="{{url('admin/scoringSheets/colour/1')}}">Colour Judge 1</a></td>
                                    <td><a href="{{url('admin/scoringSheets/colour/2')}}">Colour Judge 2</a></td>
                                    <td><a href="{{url('admin/scoringSheets/colour/3')}}">Colour Judge 3</a></td>
                                @elseif($status->id == 5 && $compstatus->getCurrentStatusFull()['id'] > 1  && $compstatus->getCurrentStatusFull()['id'] < 6)
                                    <td>
                                        <a href="{{ url('pdf/commentsPDF') }}">Comments PDF</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @elseif($status->id == 6 && $compstatus->getCurrentStatusFull()['id'] > 4 )
                                    <td>
                                        <a href="{{ url('pdf/awardsPDF') }}">Awards PDF</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif


                            </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td>
                                {{ Form::submit('Set Status') }}
                            </td>
                            <td></td>

                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    {!! Form::close() !!}

                </div>

            </div>
        @endif
    </div>
@endsection
