@extends('layouts.app')

@section('content')
    @inject('status', 'App\Http\Controllers\ClubEntryController')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">

                @if( Auth::user()->isApproved() )
                    @if( ! Auth::user()->isAdmin() )
                        You can check your panels, payment or entry by clicking on a link below
                        <ol>

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


                            @if( strcmp($status->getCurrentStatus() ,'finished')== 0)
                                <li><a href="{{ route('showOverallResults') }}">Overall Results</a></li>
                                <li><a href="{{ route('showStandings') }}">Standings</a></li>

                                <li><a href="{{ route('showIndividualScores') }}">Individual Scores</a></li>
                                <li><a href="{{ route('showStandingsPDF') }}">Download Standings</a></li>
                                <li><a href="{{ route('showIndividualScoresPDF') }}">Download Individual Scores</a></li>
                            @endif

                        </ol>
                    @else
                        <ol>
                            <li><a href="{{ route('compstatus') }}">Competition Status</a></li>
                            <li><a href="{{ route('userapproval') }}">Users</a></li>
                            <li><a href="{{ route('clubstatus') }}">Entry Status</a></li>
                            <li><a href="{{ route('colourwinners') }}">Colour Awards</a></li>
                            <li><a href="{{ route('monowinners') }}">Mono Awards</a></li>
                            <li><a href="{{ route('showStandings') }}">Standings</a></li>
                            <li><a href="{{ route('showAdminResults') }}">Overall Results</a></li>
                            <li><a href="{{ route('clubs.index') }}">Admin Clubs</a></li>
                            @if( strcmp($status->getCurrentStatus() ,'mono_scoring')== 0)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        Mono Scoring <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/') }}/admin/scoring/mono/1">Judge 1</a></li>
                                        <li><a href="{{ url('/') }}/admin/scoring/mono/2">Judge 2</a></li>
                                        <li><a href="{{ url('/') }}/admin/scoring/mono/3">Judge 3</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if( strcmp($status->getCurrentStatus() ,'colour_scoring')== 0)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        Colour Scoring <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/') }}/admin/scoring/colour/1">Judge 1</a></li>
                                        <li><a href="{{ url('/') }}/admin/scoring/colour/2">Judge 2</a></li>
                                        <li><a href="{{ url('/') }}/admin/scoring/colour/3">Judge 3</a></li>
                                    </ul>
                                </li>
                            @endif

                        </ol>
                    @endif

                @else
                    You are logged in!<br>
                    You will receive an email shortly with your user approval<br>
                    Once you are approved you can begin uploading your panels
                @endif
            </div>
        </div>

    </div>
@endsection
