<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>@yield('title')</title>
 
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style_social.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/style.css') }}"> 
</head>
<body>
    @include('layouts.elementos.navbar')
    @yield('content')  
</body>
<script type="text/javascript" src="{{ asset('bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
</html>