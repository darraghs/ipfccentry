@extends('layouts.app')

@section('content')

    <div class="container">

        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="approval">
                        <h2>Scoring {{$data['type']}} for Judge {{ $data['judge'] }}</h2>
                        {{ Form::hidden('type', $data['type'], ['id'=>'type']) }}
                        {{ Form::hidden('judge', $data['judge'], ['id'=>'judge']) }}

                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-sm-4">Status</div>
                        <div class="col-sm-8" id="status"></div>
                    </div>
                    <hr/>
                    @foreach ($panels as $panel_number => $images)
                        <div class="row">

                            <div class="col-sm-4"><h4>Panel {{$panel_number}}</h4></div>
                            <div class="col-sm-8">
                                <table>
                                    <tr>
                                        @foreach($images as $id => $data)
                                            <th>{{$data['order']}}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($images as $id => $data)
                                            <td>{!! Form::number($id, $data['score'],  ['step' => '1', 'min' => '0', 'max' => '20', 'id'=>$id, 'class' => 'scoring']) !!}</td>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <div class="row">


                        </div>
                        <hr/>
                    @endforeach


                </div>
            </div>
        @endif
    </div>

@endsection


