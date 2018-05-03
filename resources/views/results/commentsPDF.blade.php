@extends('layouts.pdf')

@section('content')

    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Judges Comments</h1></div>
    </div>

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Monochrome Panels</h1></div>
    </div>

    @foreach ($mono as $panel)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Panel {{$panel['panel_id']}} </h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$panel['club_id']}}/{{$panel['club_id']}}_mono_contact_sheet.jpg"
                    style="max-height: 500px; max-width: 1000px;"></div>

    @endforeach

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Colour Panels</h1></div>
    </div>

    @foreach ($mono as $panel)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Panel {{$panel['panel_id']}} </h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$panel['club_id']}}/{{$panel['club_id']}}_colour_contact_sheet.jpg"
                    style="max-height: 500px; max-width: 1000px;"></div>

    @endforeach

@endsection
