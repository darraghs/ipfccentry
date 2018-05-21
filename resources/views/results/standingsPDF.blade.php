@extends('layouts.pdf')

@section('content')

    <div style="padding:  15px; margin: 15px;">
        <div class="row" style="text-align: center">
            <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
        </div>
        <div class="row" style="text-align: center">
            <h1>IPF Club Championship 2018 - Standings</h1>
        </div>


        <div class="row">
            <h2>Overall Standings</h2>

        </div>
        <div class="row">

            <table style="border-collapse: unset; border-spacing: 10px; width: 100%;">
                <tr>
                    <th><h4>Clubname</h4></th>
                    <th><h3>Score</h3></th>
                    <th><h3>Place</h3></th>
                    <th><h3>Panels</h3></th>
                </tr>
                @foreach ($overall as $result)
                    <tr style="border-collapse: unset; border-spacing: 10px;border-top: black 2px solid">

                        <td><h4>{{ $result['clubname'] }}</h4></td>
                        <td>{{ $result['score'] }}</td>
                        <td>{{ $result['place'] }}</td>
                        <td><img
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
            <h2>Colour Standings</h2>

        </div>

        <div class="row">

            <table style="border-collapse: unset; border-spacing: 10px; width: 100%">
                <tr>
                    <th><h4>Clubname</h4></th>
                    <th><h3>Score</h3></th>
                    <th><h3>Place</h3></th>
                    <th><h3>Panels</h3></th>
                </tr>

                @foreach ($colour as $result)
                    <tr style="padding-bottom: 20px">

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
            <h2>Monochrome Standings</h2>

        </div>

        <div class="row">

            <table style="border-collapse: unset; border-spacing: 10px; width: 100%">
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

    </div>


@endsection

