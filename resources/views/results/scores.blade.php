@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading"><h2>Individual Scores for {{ $clubname }}</h2></div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12">
                        <h3>Colour Images</h3>
                    </div>

                </div>
                <hr/>
                <div class="row top-buffer">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Author</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Title</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Judge 1</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Judge 2</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Judge 3</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Total</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Award</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Image</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($colour as $result)
                    <div class="row top-buffer">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{$result['author']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['title']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['judge1']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['judge2']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{$result['judge3']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['total']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['award']}}
                                </div>
                                <div class="col-xs-3">
                                    <img src="/uploads/200_{{$result['image']}}" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                @endforeach

                <div class="row">
                    <div class="col-xs-12">
                        <h3>Monochrome Images</h3>
                    </div>

                </div>
                <hr/>
                <div class="row top-buffer">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Author</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Title</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Judge 1</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Judge 2</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>Judge 3</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Total</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Award</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>Image</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($mono as $result)
                    <div class="row top-buffer">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{$result['author']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['title']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['judge1']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['judge2']}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{$result['judge3']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['total']}}
                                </div>
                                <div class="col-xs-3">
                                    {{$result['award']}}
                                </div>
                                <div class="col-xs-3">
                                    <img src="/uploads/200_{{$result['image']}}" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                @endforeach

            </div>
        </div>
    </div>

@endsection


