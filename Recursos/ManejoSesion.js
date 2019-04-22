
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
        $("#img_captcha").attr("src", "GenerarCaptcha.php");
    }

    
    function ingresar( )
    {
        if( $("#nombre_usuario").val().trim() === "" )
        {
            $("#msj").text('Debes ingresar el nombre de usuario.');
            $("#msj").fadeIn(100);
            $("#nombre_usuario").focus();
            
        }
        else if( $("#nombre_usuario").val().length < 8 || $("#nombre_usuario").val().length > 16 )
        {
            $("#msj").text('Ingresa un nombre de usuario válido. (Entre 8 y 16 caracteres)');
            $("#msj").fadeIn(100);
            $("#nombre_usuario").focus();
        }
        else if( $("#clave").val().trim() === "" )
        {
            $("#msj").text('Debes ingresar la clave de acceso.');
            $("#msj").fadeIn(100);
            $("#clave").focus();
        }
        else if( $("#clave").val().length < 8 || $("#clave").val().length > 16 )
        {
            $("#msj").text('Ingresa una clave de acceso válida. (Entre 8 y 16 caracteres)');
            $("#msj").fadeIn(100);
            $("#clave").focus();
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
            $.ajax({
                cache: false,
                async: false,
                dataType: 'html',
                type: 'POST',
                url: "../controlador/C_Sesion.php",
                data: {
                    nombre_usuario: $("#nombre_usuario").val(),
                    clave: $("#clave").val().trim(),
                    captcha: $("#captcha_ingresado").val().trim(),
                    ingresar: true
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    
                },
                success: function (data) {
                    //alert(data);
                    
                    //$("#form-sesion").removeAttr("disabled");
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
                            
                            $("#nombre_usuario").val("");
                            $("#clave").val("");
                            $("#captcha_ingresado").val("");
                            CambiarImagen();
                        }
                        
                    }
                    else
                    {
                        $("#msj").text('Ha ocurrido un error, intenta nuevamente.');
                    }

                },
                beforeSend: function (xhr) {

                }
            });
        }
        return false;
    }