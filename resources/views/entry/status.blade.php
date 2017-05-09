@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">Entry Status</div>

            <div class="panel-body">

                <div class="form-group">

                    <div class="row">
                        <div class="col-sm-4">Club Name:</div>
                        <div class="col-sm-8"> {{ $clubname }}</div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Contact Name:</div>
                        <div class="col-sm-8">  {{ $name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Contact Phone:</div>
                        <div class="col-sm-8">  {{ $phone }}</div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Contact Email:</div>
                        <div class="col-sm-8">  {{ $email }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Payment Status:</div>
                        <div class="col-sm-8">  {{ $paid }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Entry Status:</div>
                        <div class="col-sm-8">  {{ $complete }}</div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Panels:</div>
                        <div class="col-sm-8">  {{ $panels }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Panel Number:</div>
                        <div class="col-sm-8">
                            @if( strcmp( $complete, "Completed") == 0)
                                {{ $panel_number }}
                            @else
                                Not yet assigned
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Colour Panel Contact Sheet</div>
                        <div class="col-sm-8">
                            @if( strcmp( $complete, "Completed") == 0)
                                <img src="/uploads/{{ $id }}/{{ $id }}_colour_contact_sheet.jpg" width="700px">
                            @else
                                Contact sheets will be available here when all images are uploaded
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">Mono Panel Contact Sheet</div>
                        <div class="col-sm-8">
                            @if( strcmp( $complete, "Completed") == 0)
                                <img src="/uploads/{{ $id }}/{{ $id }}_mono_contact_sheet.jpg" width="700px">
                            @else
                                Contact sheets will be available here when all images are uploaded
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
