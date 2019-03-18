<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="{{asset('bootstrap-3.3.7-dist/bootstrap.min.css')}}" rel="stylesheet">	
</head>
<body>

	<div class="cabecera">

		@yield("cabecera")
		<img src="/images/corpoelec-logo.png" class="imgCabecera"/>
	</div>

	<div class="contenido">
		@yield("contenido")
	</div>

	<div class="pie">

		@yield("pie")

		ZER0LC. todo los derechos reservados

	</div>

</body>
</html>