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

        h4{
        text-align: justify;
        text-transform: uppercase;
        }
    </style>
    </head>
    <body>
   
         <img src="images/logo.PNG" height="70" alt="SISOL" align="left" />

     <img src="images/logo_colegio.png" height="70" alt="SISOL" align="right" />

     <br>
      <br>


      <h3 align="center">CERTIFICACION DE EJERCICIO PROFESIONAL
PARA INGENIEROS RESIDENTES.</h3>

      
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr> 
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

   
              

   </tr>

   
 
     
        <h4> Quien suscribe Ing. JAEN MANUEL ORDOÑEZ, venezolano, mayor de edad, portador de la Cedula de Identidad N° V-14.919.789, debidamente inscrito en el Colegio de Ingenieros de Venezuela bajo el C.I.V. 170.619, en mi carácter de director de la Oficina Coordinadora del Ejercicio Profesional (O.C.E.P.R.O. YARACUY); en concordancia con lo dispuesto en el Artículo 105 de la Constitución de la República Bolivariana de Venezuela. Los Artículos 1,2,6,7,8,9,10,12,14,15,16 y 17 de la Ley del Ejercicio de la Ingeniera, Arquitectura y Profesiones Afines; el Artículo 19 del reglamento OCEPRO; los Artículos 136,137,138 y 155 numeral “9” según Ley de Contrataciones Públicas. Publicada en Gaceta Oficial de la República Bolivariana de Venezuela N°6154 de Fecha 19/11/2014. Y el Reglamento Publicado en Gaceta Oficial N°39.181 de fecha 19/05/2009. En tanto no contradigan la disposición del presente decreto con rango, valor y fuerza de la ley. Se confiere la presente Certificación de Ejercicio Profesional al ciudadano (a):
        @foreach($persona as $personaita)
         @foreach($personaita->personas as $per)

         {{$per->nombre}} {{$per->apellido}}

         portador de la Cedula de Identidad.
        
         N° V- {{$per->cedula}} 
         @endforeach
         @foreach($personaita->especialidades as $espe)
         de profesión 
         {{$espe->nombre}} 
         @endforeach
          @endforeach
         debidamente inscrito (a) en el Colegio de Ingenieros de Venezuela bajo el C.I.V. {{$agremiados->civ}} y en el Centro de Ingenieros del Estado Yaracuy, para prestar sus servicios como INGENIERO RESIDENTE del N° del contrato Nº{{$cepir->ncontrato}}. DE LA OBRA: {{$cepir->nombre_proyecto}}. MONTO:  {{$cepir->monto_letras}} (Bs. S  {{$cepir->monto_num}}).
        ENTE CONTRATANTE:  {{$instituto->nombre}}
        OBRA EJECUTADA POR LA EMPRESA:  {{$empresa->nombre}}

       
       <br>
       <br>


PRESIDENTE C.I.E.Y.             COORDINADORA DE ACCION GREMIAL               DIRECTOR O.C.E.P.R.O.

<br>
       <br>

Yo,  ELEAZAR RAMIREZ, venezolano (a), mayor de edad, portador (a) de la Cedula de Identidad N° V-17.254.028 y C.I.V. 223.075, anteriormente identificado (a), declaro que acepto la Responsabilidad como Ingeniero Residente para la obra antes mencionada acogiéndome a lo establecido en las leyes que rigen la materia.
<br>
       <br>

Certificación que se expide en Independencia a los {{$mytime->format('d')}} días del mes {{$mytime->format('m')}} del {{$mytime->format('Y')}}.



Ingeniero Residente
NOTA: para su conformación llamar al número telefónico 0426-3565699

<br>
usuario: {{ auth()->user()->name}}



 


      </h4> 

      </tr>
  </table>
    
    </body>
</html>

