 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>@yield('title' ,'Default') | Panel de Administracion</title>
 	<link rel="stylesheet" href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.css') }}">
 </head>
 <body>
 	@include('admin.template.partials.nav')
 
 	<section>
 		@yield('content')
 	</section>

<footer>
	@yield('footer')
</footer>

	<script src="{{ asset('bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js') }}"></script>
 	<script src="{{ asset('bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>

 </body>
 </html>