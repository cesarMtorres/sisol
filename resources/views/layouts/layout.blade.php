<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.7-dist/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style_social.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/style.css') }}"> 
<style type="text/css">
.container-fluid {
  margin-top: 100px;
  }
.app-descripcion{
    text-align: center;
    font-size: 1em;
    margin-bottom: 100px;
}
.app-footer{
    text-align: center;
    background: #f7f8fa;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 1px 0;
    margin-bottom: 0px;
  }
</style>
</head>

<body class="bg-light">

@include('layouts.elementos.navbar')

<div class="container-fluid">
 
@yield('content')

</div>
<div class="app-footer">
@include('layouts.elementos.footer')

</div>

<script type="text/javascript" src="{{ asset('bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</body>
</html>