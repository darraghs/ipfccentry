@extends('layouts.app')

@section('content')

    <form class="form-horizontal" onsubmit="return validateForm();" role="form" method="POST"
          enctype="multipart/form-data" action="{{ route('panelupdate') }}">
        {{ csrf_field() }}
        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$type}} panel for {{ $club }}</h2></div>

                <div class="panel-body">
                    <div class="row">
                        <div id="status" class="col-sm-4">

                            {{ Form::hidden('club_id', $club_id, ['id' =>'judge']) }}
                            {{ Form::hidden('type', $type) }}
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">

                        </div>

                    </div>
                    <hr>

                    <div class="row">

                           <span class="col-lg-2 col-sm-12 picture">
                               @if( $canUpdate )
                                   {!! Form::file('image_1',['id'=>'image_1', 'class' => $image_id_1]) !!}
                               @endif
                               @if ($image_1 == "")
                                   <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_1">
                               @else
                                   <img class="img-thumbnail" src="{{ url('/').$image_1}}" width="200" id="image_src_1">
                               @endif
                               @if( $canUpdate )
                                   {!! Form::label('author_1', 'Author Name') !!}
                                   {!! Form::text('author_1',$author_1, ['id'=>$image_id_1, 'class' => 'authorfield']) !!}
                                   {!! Form::label('title_1', 'Image Title') !!}
                                   {!! Form::text('title_1',$title_1, ['id'=>$image_id_1, 'class' => 'titlefield']) !!}
                               @else
                                   Author Name:<br>
                                   {{ $author_1 }} <br>
                                   Image Title:<br>
                                   {{ $title_1 }} <br>
                               @endif
                           </span>

                        <span class="col-lg-2 col-sm-12">
                             @if( $canUpdate )
                                {!! Form::file('image_2', ['id'=>'image_2', 'class' => $image_id_2]) !!}
                            @endif
                            @if ($image_2 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_2">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_2}}" id="image_src_2">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_2', 'Author Name') !!}
                                {!! Form::text('author_2',$author_2, ['id'=>$image_id_2, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_2', 'Image Title') !!}
                                {!! Form::text('title_2', $title_2, ['id'=>$image_id_2, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_2 }} <br>
                                Image Title:<br>
                                {{ $title_2 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_3', ['id'=>'image_3', 'class' => $image_id_3]) !!}
                            @endif
                            @if ($image_3 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_3">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_3}}" id="image_src_3">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_3', 'Author Name') !!}
                                {!! Form::text('author_3', $author_3, ['id'=>$image_id_3, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_3', 'Image Title') !!}
                                {!! Form::text('title_3', $title_3, ['id'=>$image_id_3, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_3 }} <br>
                                Image Title:<br>
                                {{ $title_3 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_4', ['id'=>'image_4', 'class' => $image_id_4]) !!}
                            @endif
                            @if ($image_4 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_4">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_4}}" id="image_src_4">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_4', 'Author Name') !!}
                                {!! Form::text('author_4', $author_4, ['id'=>$image_id_4, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_4', 'Image Title') !!}
                                {!! Form::text('title_4', $title_4, ['id'=>$image_id_4, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_4 }} <br>
                                Image Title:<br>
                                {{ $title_4 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_5', ['id'=>'image_5', 'class' => $image_id_5]) !!}
                            @endif
                            @if ($image_5 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_5">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_5}}" id="image_src_5">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_5', 'Author Name') !!}
                                {!! Form::text('author_5', $author_5, ['id'=>$image_id_5, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_5', 'Image Title') !!}
                                {!! Form::text('title_5', $title_5, ['id'=>$image_id_5, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_5 }} <br>
                                Image Title:<br>
                                {{ $title_5 }} <br>
                            @endif
                        </span>
                    </div>
                    <hr>

                    <div class="row">
                       <span class="col-lg-2 col-sm-12 picture">
                           @if( $canUpdate )
                               {!! Form::file('image_6', ['id'=>'image_6', 'class' => $image_id_6]) !!}
                           @endif
                           @if ($image_6 == "")
                               <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_6">
                           @else
                               <img class="img-thumbnail" src="{{ url('/').$image_6}}" id="image_src_6">
                           @endif
                           @if( $canUpdate )
                               {!! Form::label('author_6', 'Author Name') !!}
                               {!! Form::text('author_6', $author_6, ['id'=>$image_id_6, 'class' => 'authorfield']) !!}
                               {!! Form::label('title_6', 'Image Title') !!}
                               {!! Form::text('title_6', $title_6, ['id'=>$image_id_6, 'class' => 'titlefield']) !!}
                           @else
                               Author Name:<br>
                               {{ $author_6 }} <br>
                               Image Title:<br>
                               {{ $title_6 }} <br>
                           @endif
                       </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_7', ['id'=>'image_7', 'class' => $image_id_7]) !!}
                            @endif
                            @if ($image_7 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_7">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_7}}" id="image_src_7">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_7', 'Author Name') !!}
                                {!! Form::text('author_7', $author_7, ['id'=>$image_id_7, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_7', 'Image Title') !!}
                                {!! Form::text('title_7', $title_7, ['id'=>$image_id_7, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_7 }} <br>
                                Image Title:<br>
                                {{ $title_7 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_8', ['id'=>'image_8', 'class' => $image_id_8]) !!}
                            @endif
                            @if ($image_8 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_8">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_8}}" id="image_src_8">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_8', 'Author Name') !!}
                                {!! Form::text('author_8', $author_8, ['id'=>$image_id_8, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_8', 'Image Title') !!}
                                {!! Form::text('title_8', $title_8, ['id'=>$image_id_8, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_8 }} <br>
                                Image Title:<br>
                                {{ $title_8 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_9', ['id'=>'image_9', 'class' => $image_id_9]) !!}
                            @endif
                            @if ($image_9 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_9">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_9}}" id="image_src_9">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_9', 'Author Name') !!}
                                {!! Form::text('author_9', $author_9, ['id'=>$image_id_9, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_9', 'Image Title') !!}
                                {!! Form::text('title_9', $title_9, ['id'=>$image_id_9, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_9 }} <br>
                                Image Title:<br>
                                {{ $title_9 }} <br>
                            @endif
                        </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_10', ['id'=>'image_10', 'class' => $image_id_10]) !!}
                            @endif
                            @if ($image_10 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_10">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_10}}" id="image_src_10">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_10', 'Author Name') !!}
                                {!! Form::text('author_10', $author_10, ['id'=>$image_id_10, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_10', 'Image Title') !!}
                                {!! Form::text('title_10', $title_10, ['id'=>$image_id_10, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_10 }} <br>
                                Image Title:<br>
                                {{ $title_10 }} <br>
                            @endif
                        </span>
                    </div>
                    <div class="row">
                        <h3>Subsititues</h3>
                        <hr>
                    </div>
                    <div class="row">
                       <span class="col-lg-2 col-sm-12 picture">
                            @if( $canUpdate )
                               {!! Form::file('image_11', ['id'=>'image_11', 'class' => $image_id_11]) !!}
                           @endif
                           @if ($image_11 == "")
                               <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_11">
                           @else
                               <img class="img-thumbnail" src="{{ url('/').$image_11}}" id="image_src_11">
                           @endif
                           @if( $canUpdate )
                               {!! Form::label('author_11', 'Author Name') !!}
                               {!! Form::text('author_11', $author_11, ['id'=>$image_id_11, 'class' => 'authorfield']) !!}
                               {!! Form::label('title_11', 'Image Title') !!}
                               {!! Form::text('title_11', $title_11, ['id'=>$image_id_11, 'class' => 'titlefield']) !!}
                           @else
                               Author Name:<br>
                               {{ $author_11 }} <br>
                               Image Title:<br>
                               {{ $title_11 }} <br>
                           @endif
                       </span>

                        <span class="col-lg-2 col-sm-12">
                            @if( $canUpdate )
                                {!! Form::file('image_12', ['id'=>'image_12', 'class' => $image_id_12]) !!}
                            @endif
                            @if ($image_12 == "")
                                <img class="img-thumbnail" src="{{ url('/') }}/placeholder.png" id="image_src_12">
                            @else
                                <img class="img-thumbnail" src="{{ url('/').$image_12}}" id="image_src_12">
                            @endif
                            @if( $canUpdate )
                                {!! Form::label('author_12', 'Author Name') !!}
                                {!! Form::text('author_12', $author_12, ['id'=>$image_id_12, 'class' => 'authorfield']) !!}
                                {!! Form::label('title_12', 'Image Title') !!}
                                {!! Form::text('title_12', $title_12, ['id'=>$image_id_12, 'class' => 'titlefield']) !!}
                            @else
                                Author Name:<br>
                                {{ $author_12 }} <br>
                                Image Title:<br>
                                {{ $title_12 }} <br>
                            @endif
                        </span>

                    </div>
                    <div class="row">
                        <hr/>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            @if( $canUpdate )
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            @endif
                            {{ Form::hidden('club_id', $club_id) }}
                            {{ Form::hidden('type', $type) }}
                        </div>
                        <div id="status" class="col-sm-4"></div>
                        <div class="col-sm-4">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection


