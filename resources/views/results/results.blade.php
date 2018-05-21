@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="approval">
                    Results
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12"><h1>Overall Results</h1></div>

                </div>
                <div class="row">
                    <div class="col-xs-12"><h2>Sean Casey Memorial Trophy Winner</h2></div>

                </div>
                @foreach ($first_overall as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Overall Second Place</h3></div>
                </div>
                @foreach ($second_overall as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h3>Overall Third Place</h3></div>
                </div>
                @foreach ($third_overall as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                    </div>
                    <hr/>
                @endforeach
                <hr/>
                <div class="row">
                    <div class="col-xs-12"><h1>Colour Results</h1></div>

                </div>
                <div class="row">
                    <div class="col-xs-12"><h2>Colour First Place</h2></div>

                </div>
                @foreach ($first_colour as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg">
                                <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Colour Second Place</h3></div>
                </div>
                @foreach ($second_colour as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3">
                            <a target="_blank"
                               href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg">
                            <img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px">
                            </a>
                        </div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h3>Colour Third Place</h3></div>
                </div>
                @foreach ($third_colour as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3"><img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_colour_contact_sheet.jpg" width="200px"></div>
                    </div>
                    <hr/>
                @endforeach

                <hr/>

                <div class="row">
                    <div class="col-xs-12"><h1>Monochrome Results</h1></div>

                </div>
                <div class="row">
                    <div class="col-xs-12"><h2>Monochrome First Place</h2></div>

                </div>
                @foreach ($first_mono as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"><img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Monochrome Second Place</h3></div>
                </div>
                @foreach ($second_mono as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"><img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h3>Monochrome Third Place</h3></div>
                </div>
                @foreach ($third_mono as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->score }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg"><img src="{{ url('/') }}/uploads/{{$result->club_id}}/{{$result->club_id}}_mono_contact_sheet.jpg" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach



               
                <hr/>

                <div class="row">
                    <div class="col-xs-12"><h1>Individual Colour Results</h1></div>

                </div>
                <div class="row">
                    <div class="col-xs-12"><h2>Colour Gold Medal</h2></div>

                </div>
                @foreach ($colour_gold as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Colour Silver Medal</h3></div>
                </div>
                @foreach ($colour_silver as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h3>Colour Bronze Medal</h3></div>
                </div>
                @foreach ($colour_bronze as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Colour Highly Commended</h3></div>
                </div>
                @foreach ($colour_hc as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach


                <hr/>

                <div class="row">
                    <div class="col-xs-12"><h1>Individual Monochrome Results</h1></div>

                </div>
                <div class="row">
                    <div class="col-xs-12"><h2>Monochrome Gold Medal</h2></div>

                </div>
                @foreach ($mono_gold as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Monochrome Silver Medal</h3></div>
                </div>
                @foreach ($mono_silver as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach


                <div class="row">
                    <div class="col-xs-12"><h3>Monochrome Bronze Medal</h3></div>
                </div>
                @foreach ($mono_bronze as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12"><h3>Monochrome Highly Commended</h3></div>
                </div>
                @foreach ($mono_hc as $result)
                    <div class="row">

                        <div class="col-md-3"><h4>{{ $result->clubname }}</h4> </div>
                        <div class="col-md-3">{{ $result->author_name }} - {{ $result->title }}</div>
                        <div class="col-md-3"><a target="_blank"
                                                 href="{{ url('/') }}/uploads/{{$result->image}}"><img src="{{ url('/') }}/uploads/200_{{$result->image}}" width="200px"></a></div>
                    </div>
                    <hr/>
                @endforeach





            </div>
        </div>
    </div>


@endsection

