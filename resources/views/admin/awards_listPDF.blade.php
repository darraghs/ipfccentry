@extends('layouts.pdf')

@section('content')

    <div class="page-break"></div>

    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>


    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Individual Monochrome Results</h1></div>
    </div>

    @foreach ($mono_hc as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">
            Monochrome Highly Commended
        </h3>

        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}"
                                                         width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3>
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>



    @endforeach


    @foreach ($mono_bronze as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Bronze Medal</h3>
        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
    @endforeach


    @foreach ($mono_silver as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Silver Medal</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach



    @foreach ($mono_gold as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Gold Medal</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Individual Colour Results</h1></div>

    </div>


    @foreach ($colour_hc as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Highly Commended</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach


    @foreach ($colour_bronze as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Bronze Medal</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach

    @foreach ($colour_silver as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Silver Medal</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach

    @foreach ($colour_gold as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Gold Medal</h3>


        <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/{{$result->image}}" width="640px">
        </div>
        <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                - {{ $result->title }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


    @endforeach

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Monochrome Results</h1></div>

    </div>



    @foreach ($third_mono as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Third Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach

    @foreach ($second_mono as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome Second Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach


    @foreach ($first_mono as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Monochrome First Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>



    @endforeach
    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Colour Results</h1></div>

    </div>


    @foreach ($third_colour as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Third Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach

    @foreach ($second_colour as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Third Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach


    @foreach ($first_colour as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Colour Second Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach

    <div class="page-break"></div>
    <div class="row" style="text-align: center">
        <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
    </div>
    <div class="row">
        <div style="text-align: center"><h1>Overall Results</h1></div>

    </div>


    @foreach ($third_overall as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Overall Third Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>



    @endforeach


    @foreach ($second_overall as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Overall Second Place</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


    @endforeach


    @foreach ($first_overall as $result)
        <div class="page-break"></div>

        <h3 style="text-align: center">Sean Casey Memorial Trophy Winner</h3>


        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row" style="text-align: center"><img
                    src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                    width="640px"></div>
        <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
        <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>



    @endforeach



@endsection

