
    function letrasCaptcha(e){
        key = e.keyCode || e.which;

        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        especiales = "8-37-39-46";

        tecla_especial = false
        for(var i in especiales)
        {
            if(key == especiales[i])
            {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial)
        {
            return false;
        }
        else  
        {
            tecla=(document.all) ? e.keyCode : e.which; 
            if(tecla==32) return false; 
        }
    }
    
    function CambiarImagen()
    {
        //$("#img_captcha").removeAttr("src");
        $("#img_captcha").attr("src", "http://127.0.0.1:8000/recurso/GenerarCaptcha.php");
    }

    
    function ingresar( )
    {
        if( $("#email").val().trim() === "" )
        {
            $("#msj").text('Debes ingresar el nombre de usuario.');
            $("#msj").fadeIn(100);
            $("#email").focus();
            
        }
    /*    else if( $("#email").val().length < 8 || $("#email").val().length > 16 )
        {
            $("#msj").text('Ingresa un nombre de usuario válido. (Entre 8 y 16 caracteres)');
            $("#msj").fadeIn(100);
            $("#email").focus();
        }*/
        else if( $("#password").val().trim() === "" )
        {
            $("#msj").text('Debes ingresar la clave de acceso.');
            $("#msj").fadeIn(100);
            $("#password").focus();
        }
        else if( $("#password").val().length < 8 || $("#password").val().length > 16 )
        {
            $("#msj").text('Ingresa una clave de acceso válida. (Entre 8 y 16 caracteres)');
            $("#msj").fadeIn(100);
            $("#password").focus();
        }
        else if( $("#captcha_ingresado").val().trim() === "" )
        {
            $("#msj").text('Debes ingresar el texto que aparece en la imagen.');
            $("#msj").fadeIn(100);
            $("#captcha_ingresado").focus();
        }
        else if( $("#captcha_ingresado").val().length < 8 )
        {
            $("#msj").text('El texto ingresado no coincide con el de la imagen.');
            $("#msj").fadeIn(100);
            $("#captcha_ingresado").focus();
        }
        else
        {
            //$("#form-sesion").attr("disabled", "disabled");
 
      $('#btn-save').html('Sending..');
      
      $.ajax({
          data: $('#form-sesion').serialize(),
          url: "{{ url('ajax-crud/')}}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
                var contenido = $.trim(data); 

                    if(contenido !== "[]")
                    {

                        var json_user = $.parseJSON(contenido);
                        
                        if( json_user.resp == 1 )
                        {
                            location.href="Inicio.php";
                        }
                        else
                        {
                            $("#msj").text( $.trim(json_user.msj) );
                            $("#msj").fadeIn(100);
                            
                            $("#email").val("");
                            $("#password").val("");
                            $("#captcha_ingresado").val("");
                            CambiarImagen();
                        }
                        
                    }
                    else
                    {
                        $("#msj").text('Ha ocurrido un error, intenta nuevamente.');
                    }
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });




        }
        return false;
    }