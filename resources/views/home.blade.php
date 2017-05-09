@extends('layouts.app')

@section('content')
    @inject('status', 'App\Http\Controllers\ClubEntryController')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">

                @if( Auth::user()->isApproved() )
                    You can check your panels, payment or entry by clickling on a link below
                    <ol>

                        @if( strcmp($status->getCurrentStatus() ,'entry')== 0)
                            @if($status->hasEntry() == false)
                                <li><a href="{{ route('entry') }}">Entry Form</a></li>
                            @else
                                <li><a href="{{ route('entrystatus') }}">Entry Status</a></li>
                                <li><a href="{{ route('monopanel') }}">Mono Panel</a></li>
                                <li><a href="{{ route('colourpanel') }}">Colour Panel</a></li>
                                @if($status->isPaid() == false)
                                    <li><a href="{{ route('payment') }}">Payment</a></li>
                                @endif
                            @endif

                        @endif
                        @if( strcmp($status->getCurrentStatus() ,'mono_scoring')== 0)
                            <li><a href="{{ route('scores') }}">Scores</a></li>
                        @endif
                    </ol>
                @else
                    You are logged in!<br>
                    You will receive an email shortly with your user approval<br>
                    Once you are approved you can begin uploading your panels
                @endif
            </div>
        </div>

    </div>
@endsection
