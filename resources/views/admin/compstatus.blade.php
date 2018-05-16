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

                        @if($compstatus->getCurrentStatusFull()['id'] < 5)
                            <tr>
                                <td>Scoring Sheets</td>
                            </tr>
                            <tr>
                                <td>Monochrome</td>
                            </tr>
                            <tr>
                                <td><a href="{{url('admin/scoringSheets/mono/1')}}">Judge 1</a></td>
                                <td><a href="{{url('admin/scoringSheets/mono/2')}}">Judge 2</a></td>
                                <td><a href="{{url('admin/scoringSheets/mono/3')}}">Judge 3</a></td>
                            </tr>
                            <tr>
                                <td>Scoring Sheets</td>
                            </tr>
                            <tr>
                                <td>Colour</td>
                            </tr>
                            <td><a href="{{url('admin/scoringSheets/colour/1')}}">Judge 1</a></td>
                            <td><a href="{{url('admin/scoringSheets/colour/2')}}">Judge 2</a></td>
                            <td><a href="{{url('admin/scoringSheets/colour/3')}}">Judge 3</a></td>

                            </tr>
                        @else
                            <tr>
                                <td>
                                    <a href="{{ url('pdf/commentsPDF') }}">Comments PDF</a>
                                </td>
                                <td>
                                    <a href="{{ url('pdf/awardsPDF') }}">Awards PDF</a>
                                </td>
                                <td></td>
                            </tr>
                        @endif


                    </table>
                    {!! Form::close() !!}

                </div>

            </div>
        @endif
    </div>
@endsection
