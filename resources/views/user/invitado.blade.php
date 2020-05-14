
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/font-awesome/css/font-awesome.css') }}" />

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

</head>

<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Crear Nuevo Usuario</p>
 <center><span class="red bolder" style="display: none;" id="msj"></span>
</center>
    <form method="POST" action="{{ action('UsersController@storeinvitado') }}"  role="form">

      @csrf
      <div class="form-group has-feedback ">
        <input type="text" class="form-control" placeholder="Usuario" name="name" id="name" value="{{ old('name') }}" maxlength="50" autofocus>
       
   </div>
      <div class="form-group has-feedback ">
        <input type="text" class="form-control" placeholder="Correo" name="email" id="email" value="{{ old('email') }}" maxlength="50">
        

      </div>
      <div class="form-group has-feedback ">
        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" value="{{ old('password') }}" maxlength="50" >
       

      </div>
      

<div class="row">
        
        <!-- /.col -->
        <br/>
        <div align="center" class="col-xs-4">
          <button type="submit" class="btn btn-primary">Registrar</button>

        </div>

        <!-- /.col -->
      </div> 
        
  
    </form>


             
           
           

       


    <br>
    <!-- /.social-auth-links -->

    <!--<a href="#">Olvide mi contraseña</a><br>-->


  </div>
  <!-- /.login-box-body -->
</div>


<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('assets/assets/vendor/jquery/jquery.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script type="text/javascript" src="{{ asset('recurso/ManejoSesion.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/ace-elements.min.js ')}}"></script>
<script src="{{ asset('js/ace.min.js" ')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
