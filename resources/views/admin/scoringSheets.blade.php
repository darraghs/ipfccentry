@extends('layouts.pdf')

@section('content')

    <div class="container">

        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Scoring {{$data['type']}} Panels for Judge {{ $data['judge'] }}</h3>
                </div>
                <div class="panel-body">

                    @foreach ($panels as $panel_number => $rows)
                        @foreach($rows as $row => $images)
                            <div><h4>Panel {{$panel_number}} -
                                    @if($row == 1)
                                        Top Row
                                    @else
                                        Bottom Row
                                    @endif
                                </h4></div>

                            <div class="row">

                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <th style="width: 100px; text-align: left">Order</th>
                                            @foreach($images as $id => $data)
                                                <th style="text-align: center">{{$data['order']}}</th>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td style="width: 100px">Image</td>
                                            @foreach($images as $id => $data)
                                                <td style="text-align: center; vertical-align: bottom"><img
                                                            src="{{ url('/') }}/uploads/200_{{$data['image']}}"
                                                            style="max-width: 100px; max-height: 60px"></td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td style="width: 100px">Score</td>
                                            @foreach($images as $id => $data)
                                                <td style="border: 2px solid; height: 50px; width: 100px"><br/></td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td style="width: 100px">Title</td>
                                            @foreach($images as $id => $data)
                                                <td style="text-align: center">{{$data['title']}}</td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <div class="row">


                            </div>
                            <hr/>
                        @endforeach
                        @if( $panel_number%2 == 0 )
                            <div class="page-break"></div>
                        @endif
                    @endforeach


                </div>
            </div>
        @endif
    </div>

@endsection


