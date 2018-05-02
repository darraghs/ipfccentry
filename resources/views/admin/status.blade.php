@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="approval">
                    <span id="status"></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Club</h4>
                            </div>

                            <div class="col-xs-3">
                                <h4>Panel</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Contact</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Phone</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">


                            <div class="col-xs-3">
                                <h4>Mono</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Colour</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Email</h4>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach ($entries as $club => $data)


                    <div class="row seven-cols">

                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{$club}}
                                    <br/>
                                    @if( strcmp( $data['status'], "complete") == 0)
                                        <i>Completed</i>
                                    @else
                                        <b>Incomplete</b>
                                    @endif
                                    <br/>
                                    <div class="col-sm-4 col-md-2">
                                        {{Form::select($data['club_id'], ['unpaid' => "Unpaid",
                                            'paypal' => "Paypal",
                                            'cheque' => "Cheque",
                                            'cash' => "Cash"], $data['paid'], ['class' =>'payment'])
                                            }}
                                    </div>
                                    @if( strcmp( $data['paid'], "unpaid") == 0)
                                        <b>Unpaid</b>
                                    @else
                                        <i>{{$data['paid']}}</i>
                                    @endif
                                </div>

                                <div class="col-xs-3">
                                    {{$data['panel_number']}}
                                    @if( strcmp( $data['status'], "complete") == 0)
                                        - <a href="{{ url('/') }}/results/showPanelScores/{{$data['club_id']}}">Scores</a>
                                        @endif
                                </div>
                                <div class="col-xs-3">
                                    {{$data['name']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$data['phone']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">


                                <div class="col-xs-3">
                                    @if( strcmp($data['hasMono'], 'yes') == 0)
                                        <a href="{{ url('/') }}/admin/checkClubPanel/{{$data['club_id']}}">Images</a>
                                        @if( strcmp( $data['status'], "complete") == 0)
                                            <a href="{{ url('/') }}/uploads/{{$data['club_id']}}/{{$data['club_id']}}_mono_contact_sheet.jpg">Sheet</a>
                                        @endif
                                    @endif


                                </div>
                                <div class="col-xs-3">
                                    @if( strcmp($data['hasColour'], 'yes') == 0)
                                        <a href="{{ url('/') }}/admin/showColourPanel/{{$data['club_id']}}">Images</a>
                                        @if( strcmp( $data['status'], "complete") == 0)
                                            <a href="{{ url('/') }}/uploads/{{$data['club_id']}}/{{$data['club_id']}}_colour_contact_sheet.jpg">Sheet</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-xs-3">
                                    {{$data['email']}}
                                </div>
                            </div>
                        </div>


                    </div>
                    <hr/>
                @endforeach
            </div>

        </div>

    </div>
@endsection


