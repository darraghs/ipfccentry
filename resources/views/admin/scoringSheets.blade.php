@extends('layouts.pdf')

@section('content')

    <div class="container">

        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="approval">
                        <h2>Scoring {{$data['type']}} Panels for Judge {{ $data['judge'] }}</h2>
                    </div>
                </div>
                <div class="panel-body">

                    @foreach ($panels as $panel_number => $rows)
                        @foreach($rows as $row => $images)
                            <div><h3>Panel {{$panel_number}} -
                                    @if($row == 1)
                                        Top Row
                                    @else
                                        Bottom Row
                                    @endif
                                </h3></div>

                            <div class="row">

                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <th style="width: 200px; text-align: left">Order</th>
                                            @foreach($images as $id => $data)
                                                <th style="text-align: center">{{$data['order']}}</th>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td style="width: 200px">Image</td>
                                            @foreach($images as $id => $data)
                                                <td style="text-align: center;"><img
                                                            src="{{ url('/') }}/uploads/200_{{$data['image']}}"
                                                            style="max-width: 200px; max-height: 200px"></td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td style="width: 200px">Score</td>
                                            @foreach($images as $id => $data)
                                                <td style="border: 2px solid; height: 50px; width: 200px"><br/></td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td style="width: 200px">Title</td>
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
                    @endforeach


                </div>
            </div>
        @endif
    </div>

@endsection


