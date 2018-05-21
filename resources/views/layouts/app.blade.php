<!DOCTYPE html>

@inject('status', 'App\Http\Controllers\ClubEntryController')
@inject('compstatus', 'App\Http\Controllers\PublicStatusController')
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IPF Club Championship') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                @elseif( Auth::user()->isApproved()  && !Auth::user()->isAdmin())
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Branding Image -->
                        <li>
                            <a href="{{ route('home') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>

                        </li>
                        @if($status->hasEntry() == false)
                            <li><a href="{{ route('entry') }}">Entry Form</a></li>
                        @else
                            <li><a href="{{ route('entrystatus') }}">Entry Status</a></li>
                            @if($status->isPaid() == false)
                                <li><a href="{{ route('payment') }}">Payment</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Results <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('monopanel') }}">Mono Panel</a></li>
                                    <li><a href="{{ route('colourpanel') }}">Colour Panel</a></li>
                                </ul>
                            </li>

                        @endif

                        @if( strcmp($status->getCurrentStatus() ,'finished')== 0)

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Results <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('showOverallResults') }}">Overall Results</a></li>
                                    <li><a href="{{ route('showStandings') }}">Standings</a></li>
                                    <li><a href="{{ route('showIndividualScores') }}">Individual Scores</a></li>
                                    <li><a href="{{ route('showIndividualScoresPDF') }}">Download Individual Scores</a></li>
                                    <li><a href="{{ route('showStandingsPDF') }}">Download Standings</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                @else
                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if($compstatus->getCurrentStatusFull()['id'] == 1)
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @else
                        @if(Auth::user()->isAdmin())
                            @if( strcmp($compstatus->getCurrentStatus() ,'mono_scoring')== 0)
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
                            @if( strcmp($compstatus->getCurrentStatus() ,'colour_scoring')== 0)
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('compstatus') }}">Competition Status</a></li>
                                    <li><a href="{{ route('userapproval') }}">Users</a></li>
                                    <li><a href="{{ route('clubstatus') }}">Entry Status</a></li>
                                    <li><a href="{{ route('colourwinners') }}">Colour Awards</a></li>
                                    <li><a href="{{ route('monowinners') }}">Mono Awards</a></li>
                                    <li><a href="{{ route('showStandings') }}">Standings</a></li>
                                    <li><a href="{{ route('showAdminResults') }}">Overall Results</a></li>
                                    <li><a href="{{ route('clubs.index') }}">Admin Clubs</a></li>
                                </ul>
                            </li>
                        @endif

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script type="application/javascript">
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

</script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
