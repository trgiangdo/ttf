<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{ asset('assets')}}/" target="_self">

    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="clock/compiled/flipclock.css">

    <link rel="stylesheet" href="css/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    @include('components.header')

	@yield('content')

    @include('components.footer')

    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/slick/slick.js"></script>
    <script src="js/style.js"></script>

    @yield('scripts')
</body>
</html>