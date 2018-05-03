@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="approval">
                    Standings
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h2>Overall Standings</h2></div>

                </div>
                <div class="row">

                    <div class="col-md-3"><h4>Clubname</h4></div>
                    <div class="col-md-3"><h3>Score</h3></div>
                    <div class="col-md-3"><h3>Place</h3></div>
                    <div class="col-md-3"><h3>Panels</h3></div>
                </div>
                @foreach ($overall as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result['clubname'] }}</h4></div>
                        <div class="col-md-3">{{ $result['score'] }}</div>
                        <div class="col-md-3">{{ $result['place'] }}</div>
                        <div class="col-md-3"><img
                                    src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_mono_contact_sheet.jpg"
                                    width="100px"><br/><br/><img
                                    src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_colour_contact_sheet.jpg"
                                    width="100px"></div>
                    </div>
                    <hr/>
                @endforeach
                <div class="row">
                    <div class="col-xs-12"><h2>Colour Standings</h2></div>

                </div>

                <div class="row">

                    <div class="col-md-3"><h4>Clubname</h4></div>
                    <div class="col-md-3"><h3>Score</h3></div>
                    <div class="col-md-3"><h3>Place</h3></div>
                    <div class="col-md-3"><h3>Panels</h3></div>
                </div>
                @foreach ($colour as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result['clubname'] }}</h4></div>
                        <div class="col-md-3">{{ $result['score'] }}</div>
                        <div class="col-md-3">{{ $result['place'] }}</div>
                        <div class="col-md-3"><img
                                    src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_colour_contact_sheet.jpg"
                                    width="100px"></div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h2>Monochrome Standings</h2></div>

                </div>

                <div class="row">

                    <div class="col-md-3"><h4>Clubname</h4></div>
                    <div class="col-md-3"><h3>Score</h3></div>
                    <div class="col-md-3"><h3>Place</h3></div>
                    <div class="col-md-3"><h3>Panels</h3></div>
                </div>
                @foreach ($mono as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result['clubname'] }}</h4></div>
                        <div class="col-md-3">{{ $result['score'] }}</div>
                        <div class="col-md-3">{{ $result['place'] }}</div>
                        <div class="col-md-3"><img
                                    src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_mono_contact_sheet.jpg"
                                    width="100px"></div>
                    </div>
                    <hr/>
                @endforeach


            </div>
        </div>
    </div>


@endsection

