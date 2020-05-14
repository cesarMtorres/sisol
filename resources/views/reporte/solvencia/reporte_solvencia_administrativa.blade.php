<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
   
         <img src="images/logo.PNG" height="70" alt="SISOL" align="left" />

     <img src="images/logo_colegio.png" height="70" alt="SISOL" align="right" />

     <br>
      <br>
      <br>


      <h3 align="center">Agremiados</h3>
  
     
     <table name="vamo" id="vamo" width="100%" style="border-collapse: collapse; border: 0px;">
      {{$table_data}}

      
  </table>
   <h4 align="right" >Usuario: {{ auth()->user()->name}}<h4>
       <h4 align="right" >Fecha: {{$mytime->format('d-m-Y')}}<h4>

    
    </body>
</html>



 @section('js')
 <script>
$(document).ready(function(){
 
    $('#vamo').html(data.table_data);
    $('#total_records').text(data.total_data);
 
  
});
</script>
 @endsection






