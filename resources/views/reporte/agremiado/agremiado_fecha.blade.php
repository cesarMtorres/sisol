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
  
     
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr> 
      <th style="border: 1px solid; padding:2px;" width="1%">ITEM</th>
    <th style="border: 1px solid; padding:12px;" width="3%">CEDULA</th>
     <th style="border: 1px solid; padding:12px;" width="5%">NOMBRE</th>
      <th style="border: 1px solid; padding:12px;" width="5%">APELLIDO</th>
       <th style="border: 1px solid; padding:12px;" width="2%">CIV</th>
    <th style="border: 1px solid; padding:12px;" width="5%">UNIVERSIDAD</th>

   
   </tr>

         @foreach($agremiados as $personaita)
         
         
        <tr>
        
        
  
         <td style="border: 1px solid; padding:12px;"  width="1%" >{{$key++}}</td>
         <td style="border: 1px solid; padding:12px;"  width="3%" >{{$personaita->cedula}}</td>
         <td style="border: 1px solid; padding:12px;"  width="5%">{{$personaita->nombre}}</td>
         <td style="border: 1px solid; padding:12px;"  width="5%">{{$personaita->apellido}}</td>
         <td style="border: 1px solid; padding:12px;"  width="2%">{{$personaita->civ}}</td>
        <td style="border: 1px solid; padding:12px;"  width="5%">{{$personaita->uni}}</td>
         
         


    

</tr>
@endforeach
          
           <tr>
           <th style="border: 1px solid; padding:12px;"  width="1%" >{{$key}}</th>
            <th style="border: 1px solid; padding:12px;" width="3%">TOTAL</th>
            <th style="border: 0px solid; padding:12px;"></th>
            <th style="border: 0px solid; padding:12px;" ></th>
            <th style="border: 0px solid; padding:12px;" ></th>
              <th style="border: 0px solid; padding:12px;" ></th>
           </tr>

      
  </table>
   <h4 align="right" >Usuario: {{ auth()->user()->name}}<h4>
       <h4 align="right" >Fecha: {{$mytime->format('d-m-Y')}}<h4>

    
    </body>
</html>

