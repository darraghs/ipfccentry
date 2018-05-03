@extends('layouts.pdf')

@section('content')

    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Results</h1></div>
    </div>

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Monochrome Panels</h1></div>
    </div>

    @foreach ($mono_hc as $panel)
        <div class="page-break"></div>

        <h3 style="text-align: center">
            Monochrome Highly Commended
        </h3>

        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}"
                                                         style="max-height: 500px; max-width: 1000px;"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3>
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>



    @endforeach

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Colour Panels</h1></div>
    </div>

@endsection
