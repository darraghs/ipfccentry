<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IPF Club Championship') }}</title>

    <!-- Styles -->


    <style>
        .page-break {
            page-break-after: always;
        }
	@page { margin-left: 10px; margin-top: 10px; margin-right: 10px; margin-bottom: 0px; }
	html{ margin-left: 10px; margin-top: 10px; margin-right: 10px; margin-bottom: 0px; }
    </style>

</head>
<body style="margin: 0px; padding: 0px">
<div id="app">


    @yield('content')
</div>


</body>
</html>
