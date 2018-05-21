@extends('layouts.pdf')

@section('content')

    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row" style="text-align: center">
        <h2>IPF Club Championship 2018</h2>
    </div>



    <div class="row">
        <div class="col-xs-12"><h2>Overall Standings</h2></div>

    </div>
    <div class="row">

        <table style="width:  100%">
            <tr>
                <th style="width: 25%"><h4>Clubname</h4></th>
                <th style="width: 10%"><h3>Score</h3></th>
                <th style="width: 10%"><h3>Place</h3></th>
                <th style="width: 55%"><h3>Panels</h3></th>
            </tr>
            @foreach ($overall as $result)
                <tr>

                    <td style="width: 25%"><h4>{{ $result['clubname'] }}</h4></td>
                    <td style="width: 10%">{{ $result['score'] }}</td>
                    <td style="width: 10%">{{ $result['place'] }}</td>
                    <td style="width: 55%"><img
                                src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_mono_contact_sheet.jpg"
                                width="200px"><br/><br/><img
                                src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_colour_contact_sheet.jpg"
                                width="200px"></td>
                </tr>
            @endforeach
        </table>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12"><h2>Colour Standings</h2></div>

    </div>

    <div class="row">

        <table>
            <tr>
                <th><h4>Clubname</h4></th>
                <th><h3>Score</h3></th>
                <th><h3>Place</h3></th>
                <th><h3>Panels</h3></th>
            </tr>

            @foreach ($colour as $result)
                <tr>

                    <td><h4>{{ $result['clubname'] }}</h4></td>
                    <td>{{ $result['score'] }}</td>
                    <td>{{ $result['place'] }}</td>
                    <td><img
                                src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_colour_contact_sheet.jpg"
                                width="200px"></td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr/>


    <div class="row">
        <div class="col-xs-12"><h2>Monochrome Standings</h2></div>

    </div>

    <div class="row">

        <table>
            <tr>
                <th><h4>Clubname</h4></th>
                <th><h3>Score</h3></th>
                <th><h3>Place</h3></th>
                <th><h3>Panels</h3></th>
            </tr>

            @foreach ($mono as $result)
                <tr>

                    <td><h4>{{ $result['clubname'] }}</h4></td>
                    <td>{{ $result['score'] }}</td>
                    <td>{{ $result['place'] }}</td>
                    <td><img
                                src="{{ url('/') }}/uploads/{{$result['club_id']}}/{{$result['club_id']}}_mono_contact_sheet.jpg"
                                width="200px"></td>
                </tr>
        @endforeach


    </div>




@endsection

