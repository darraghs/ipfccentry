@extends('layouts.pdf')

@section('content')

    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
                </div>
            </div>
        </div>
    </div>

    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Individual Monochrome Results</h1></div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($mono_hc as $result)
        <div class="page-break"></div>
        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        Monochrome Highly Commended
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img src="{{ url('/') }}/uploads/200_{{$result->image}}"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3>
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>


                </div>
            </div>
        </div>
    @endforeach


    @foreach ($mono_bronze as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome Bronze Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($mono_silver as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome Silver Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach



    @foreach ($mono_gold as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome Gold Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Individual Colour Results</h1></div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($colour_hc as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Highly Commended</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($colour_bronze as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Bronze Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    @foreach ($colour_silver as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Silver Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    @foreach ($colour_gold as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Gold Medal</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/200_{{$result->image}}">
                    </div>
                    <div class="row"><h3 style="text-align: center">{{ $result->author_name }}
                            - {{ $result->title }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Monochrome Results</h1></div>
                </div>
            </div>
        </div>
    </div>



    @foreach ($third_mono as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome Third Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    @foreach ($second_mono as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome Second Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($first_mono as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Monochrome First Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


                </div>
            </div>
        </div>
    @endforeach
    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Colour Results</h1></div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($third_colour as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Third Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    @foreach ($second_colour as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Third Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($first_colour as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Colour Second Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach

    <div class="page-break"></div>
    <div class="container">

        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Overall Results</h1></div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($third_overall as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Overall Third Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


                </div>
            </div>
        </div>
    @endforeach


    @foreach ($second_overall as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Overall Second Place</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>

                </div>
            </div>
        </div>
    @endforeach


    @foreach ($first_overall as $result)
        <div class="page-break"></div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Sean Casey Memorial Trophy Winner</h3>

                </div>
                <div class="panel-body">
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"
                        ></div>
                    <div class="row" style="text-align: center"><img
                                src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg"
                        ></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->clubname }}</h3></div>
                    <div class="row"><h3 style="text-align: center">{{ $result->score }}</h3></div>


                </div>
            </div>
        </div>
    @endforeach



@endsection

