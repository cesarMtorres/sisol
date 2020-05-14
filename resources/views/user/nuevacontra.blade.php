
<!DOCTYPE html>
<html>


<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <p class="login-box-msg">Olvide mi contraseña</p>
 <center><span class="red bolder" style="display: none;" id="msj"></span>
</center>
      
    <form method="get" action="{{ action('UsersController@updatecontra',$identifica) }}"  role="form">
              @csrf
               @method('put')
             
     
       @foreach($consulta as $usu)

        <input type="hidden"  name="id" id="id" value="{{$usu->id}}" maxlength="50">
      
      <div class="form-group has-feedback ">
         <p class="login-box-msg">Correo</p>
        <input type="text" class="form-control" placeholder="Correo" name="email" id="email" value="{{$usu->email}}" maxlength="50">
        </div>
        
         <p class="login-box-msg" align="left">Nueva Contraseña</p>
        <div class="form-group has-feedback ">
       
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('password')}}">
       

      </div>
      </div>

       
        
         <p class="login-box-msg" align="left">Repita la contraseña</p>
        <div class="form-group has-feedback ">
       
                  <div class="form-group">
                    <input type="password" name="password2" id="password2" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('password')}}">
       

      </div>
      </div>


     
           <label id="mensaje_error" class="control-label col-md-12 text-success" style="display: block;">Las constraseñas si coinciden</label>
     
       

</div>
      @endforeach
<div class="row">
        
        <!-- /.col -->
        <br/>
        <div align="center" class="col-xs-4">
          <button type="submit" class="btn btn-primary" id="boton">Consultar</button>

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


$(document).ready(function () {
    $('#mensaje_error').hide();  
});

var cambioDePass = function() {
    var cont = $('#password').val();
    var cont2 = $('#password2').val();
    if (cont == cont2) {
        $('#mensaje_error').hide();
        $('#mensaje_error').attr("class", "control-label col-md-12 text-success");
        $('#mensaje_error').show();
        $('#mensaje_error').html("Las constraseñas si coinciden");
        $("#boton").removeAttr('disabled');
    } else {
         $('#mensaje_error').html("Las constraseñas no coinciden");
        $('#mensaje_error').show();
        
        $("#boton").attr('disabled','disabled');
        
    }
}

$("#password").on('keyup', cambioDePass);
$("#password2").on('keyup', cambioDePass);

</script>

</body>
</html>
