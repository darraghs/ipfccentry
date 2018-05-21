@extends('layouts.pdf')

@section('content')

    <div style="padding:  15px; margin: 15px;">
        <div class="row" style="text-align: center">
            <img src="http://irishphoto.ie/wp-content/uploads/2015/08/cropped-ipf-banner4.png">
        </div>
        <div class="row" style="text-align: center">
            <h1>Individual Scores for {{ $clubname }}</h1>
        </div>


        <hr/>
        @if( $colour )
            <div class="row">
                <h3>Colour Images</h3>

            </div>

            <table style="border-collapse: unset; border-spacing: 10px; width: 100%;">
                <tr>
                    <th class="col-xs-3">
                        <h4>Author</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Title</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Judge 1</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Judge 2</h4>
                    </th>

                    <th class="col-xs-3">
                        <h4>Judge 3</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Total</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Award</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Image</h4>
                    </th>
                </tr>
                @foreach($colour as $result)
                    <tr>

                        <td class="col-xs-3">
                            {{$result['author']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['title']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge1']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge2']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge3']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['total']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['award']}}
                        </td>
                        <td class="col-xs-3">
                            <img src="{{ url('/') }}/uploads/200_{{$result['image']}}" width="100px">
                        </td>
                    </tr>
                @endforeach
            </table>

            <hr/>

        @endif


        @if( $mono )
            <div class="row">

                <h3>Monochrome Images</h3>

            </div>

            <table style="border-collapse: unset; border-spacing: 10px; width: 100%;">
                <tr>
                    <th class="col-xs-3">
                        <h4>Author</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Title</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Judge 1</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Judge 2</h4>
                    </th>

                    <th class="col-xs-3">
                        <h4>Judge 3</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Total</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Award</h4>
                    </th>
                    <th class="col-xs-3">
                        <h4>Image</h4>
                    </th>
                </tr>
                @foreach($mono as $result)
                    <tr>

                        <td class="col-xs-3">
                            {{$result['author']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['title']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge1']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge2']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['judge3']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['total']}}
                        </td>
                        <td class="col-xs-3">
                            {{$result['award']}}
                        </td>
                        <td class="col-xs-3">
                            <img src="{{ url('/') }}/uploads/200_{{$result['image']}}" width="100px">
                        </td>
                    </tr>
                @endforeach
            </table>

        @endif
    </div>

@endsection


