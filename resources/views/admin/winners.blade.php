@extends('layouts.app')

@section('content')
    <div class="container">
        @if( Auth::user()->isAdmin() )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="approval">
                        Set Award Winners
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-2"><h4>Panel</h4></div>
                        <div class="col-sm-4 col-md-2"><h4>Title</h4></div>
                        <div class="col-sm-4 col-md-2"><h4>Score</h4></div>
                        <div class="col-sm-4 col-md-2"><h4>Image</h4></div>
                        <div class="col-md-2"><h4>Award</h4></div>
                    </div>

                    @foreach ($winners as $winner)
                        <div class="row">

                            <div class="col-sm-4 col-md-2">{{ $winner->panel_number }}
                                - {{ $winner->panel_order }}</div>
                            <div class="col-sm-4 col-md-2">{{ $winner->title }}</div>
                            <div class="col-sm-4 col-md-2">{{$winner->TOTAL}}</div>
                            <div class="col-sm-4 col-md-2"><img src="{{ url('/') }}/uploads/200_{{$winner->image}}"
                                                                width="150px"></div>


                            <div class="col-sm-4 col-md-2">
                                {{Form::select($winner->pid, ['6' => "Gold Medal",
                                    '5' => "Silver Medal",
                                    '4' => "Bronze Medal",
                                    '3' => "Highly Commended",
                                    '0' => "No Award"], $winner->award, ['class' =>'selectwinner'])
                                    }}
                            </div>

                        </div>
                        <hr/>
                    @endforeach


                </div>
            </div>
        @endif
    </div>


@endsection

