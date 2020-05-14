@extends('layouts.layout')
@section('title','CEPIR')
@section('content')
@section('panel_name','Cepir')
@section('panel_rigth','Cepir')

                <section class="panel">

                  <header class="panel-heading">
                   
            


  
                  <div id="modalBasic" class="modal-block mfp-hide">
                    <section class="panel">
                      
                      <div class="panel-body">
                        <div class="modal-wrapper">
                          <div class="modal-text"> 
                            <p>tabla</p>
                          </div>
                        </div>
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button class="btn btn-primary modal-confirm">Aceptar</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                          </div>
                        </div>
                      </footer>
                    </section>
                  </div>
 
                    <div class="panel-actions">

                      <a href="#" class="fa fa-caret-down"></a>
                    </div>

                    <h2 class="panel-title">Agremiado a Certificar</h2>
                  </header>
                  <div class="panel-body">
                     <div class="col">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif

      <div class="panel panel-default">


        <div class="panel-body">         
        
          <div class="table-container">
            <form method="POST" action="{{ route('cepir.store') }}"  role="form">
              @csrf

              
              <input name="_method" type="hidden" value="POST">
              
                @foreach($agremiados as $agremiado)
                @foreach($agremiado->personas as $persona)

                <input type="hidden" name="status" id="status" value="DEUDOR">

                <input type="hidden" name="personaid" value="{{$persona->id}}">

                 <input type="hidden" name="agremiado_id" value="{{$agremiado->id}}">

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly" value="{{$persona->nombre}}">
                  </div>
                </div>
                    
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Cédula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly" value="{{$persona->cedula}}">
                  </div>
                </div>
              </div>
              <br>


             
             

              <div class="form-group">
                <label>Dirección</label>
                <textarea name="direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Resumen" readonly="readonly">{{$persona->direccion}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" readonly="readonly" value="{{$agremiado->civ}}">
                  </div>
                </div>

                 
                  @foreach($agremiado->especialidades as $rula)
                           
                       
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly"  value="{{$rula->nombre}}">
                  </div>
                </div>
              

              @endforeach

             
              
                      
                      
                 
               
                </div>
                
                 
             
              
              @endforeach
              @endforeach
              <br>

              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label for="">Nombre del Proyecto</label>
                  <input type="text" required="required" name="nombre_proyecto" class="form-control input-sm" pattern=".{0}|.{3,150}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="150">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label for="">N de Contrato</label>
                  <input type="text" required="required" name="ncontrato" class="form-control input-sm" pattern=".{0}|.{3,20}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="20">
                </div>
              </div>  
              <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">

                
                  <label>Empresa</label>
                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 70%;" name="empresa_id" id="empresa_id">
                      @if(count($empresa))
                        @foreach ($empresa as $empresas)
                            <option value="{{ $empresas->id }}">{{ $empresas->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen empresas</option>
                      @endif
                    </select>
                </div>

                 <div class="col-xs-6 col-sm-6 col-md-6">

                
                  <label>Instituto</label>
                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 70%;" name="instituto_id" id="instituto_id">
                      @if(count($instituto))
                        @foreach ($instituto as $institutos)
                            <option value="{{ $institutos->id }}">{{ $institutos->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen institutos</option>
                      @endif
                    </select>
                </div>
                </div>

               <br>


                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Monto</label>
                  <div class="form-group">
                    <input type="text" required="required" id="numero" name="monto_num"  pattern=".{0}|.{2,12}" class="form-control input-sm" onkeyup="mostrarNumero(this)" maxlength="9" >
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Monto en letras</label>
                    <input type="text" readonly="readonly" name="monto_letras" id="mostrarAca" class="form-control input-sm" maxlength="255" >
                  </div>

                </div>
                
                    
              </div>
              <br>

              <div id="sms"></div>
              <a href="{{ route('cepir.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>


             
          

            </form>
          </div>
        </div>

      </div>
    </div>
                    </form>
                  </div>
                </section>


                

    


 

  @endsection

  @section('js')
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

  @endsection


        <script type="text/javascript">
            // Convert numbers to words
            // copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
            // permission to use this Javascript on your web page is granted
            // provided that all of the code (including this copyright notice) is
            // used exactly as shown (you can change the numbering system if you wish)
     
            // American Numbering System
            var th = ['','MIL','MILLON', 'BILLONES','TRILLONES'];
            // uncomment this line for English Number System
            // var th = ['','thousand','million', 'milliard','billion'];
     
            var dg = ['CER0','UNO','DOS','TRES','CUATROS', 'CINCO','SEIS','SIETE','OCHO','NUEVE']; 
            var tn = ['DIES','ONCE','DOCE','TRECE', 'CATORCE','QUINCE','DIESICEIS', 'DIESICIETE','DIESIOCHO','DIESINUEVE']; 
            var tw = ['VEINTE','TREINTA','CUARENTA','CINCUENTA', 'SESENTA','SETENTA','OCHENTA','NOVENTA']; 
            function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'NO ES UN NUMERO'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'MUY GRANDE'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'CIENTOS ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'PUNTO '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}
        </script>
        
        <script type="text/javascript">
             function mostrarNumero(elem){
                var texto = toWords(elem.value);
                document.getElementById('mostrarAca').value = texto;
             }
        </script>




<script type="text/javascript">

document.getElementById("numero").addEventListener("keyup",function(e){

    document.getElementById("texto").innerHTML=NumeroALetras('11');

});

 


 </script>

<script>
function Unidades(num){

 

  switch(num)

  {

    case 1: return "UN";

    case 2: return "DOS";

    case 3: return "TRES";

    case 4: return "CUATRO";

    case 5: return "CINCO";

    case 6: return "SEIS";

    case 7: return "SIETE";

    case 8: return "OCHO";

    case 9: return "NUEVE";

  }

 

  return "";

}

 

function Decenas(num){

 

  decena = Math.floor(num/10);

  unidad = num - (decena * 10);

 

  switch(decena)

  {

    case 1:

      switch(unidad)

      {

        case 0: return "DIEZ";

        case 1: return "ONCE";

        case 2: return "DOCE";

        case 3: return "TRECE";

        case 4: return "CATORCE";

        case 5: return "QUINCE";

        default: return "DIECI" + Unidades(unidad);

      }

    case 2:

      switch(unidad)

      {

        case 0: return "VEINTE";

        default: return "VEINTI" + Unidades(unidad);

      }

    case 3: return DecenasY("TREINTA", unidad);

    case 4: return DecenasY("CUARENTA", unidad);

    case 5: return DecenasY("CINCUENTA", unidad);

    case 6: return DecenasY("SESENTA", unidad);

    case 7: return DecenasY("SETENTA", unidad);

    case 8: return DecenasY("OCHENTA", unidad);

    case 9: return DecenasY("NOVENTA", unidad);

    case 0: return Unidades(unidad);

  }

}//Unidades()

 

function DecenasY(strSin, numUnidades){

  if (numUnidades > 0)

    return strSin + " Y " + Unidades(numUnidades)

 

  return strSin;

}//DecenasY()

 

function Centenas(num){

 

  centenas = Math.floor(num / 100);

  decenas = num - (centenas * 100);

 

  switch(centenas)

  {

    case 1:

      if (decenas > 0)

        return "CIENTOS " + Decenas(decenas);

      return "CIEN";

    case 2: return "DOSCIENTOS " + Decenas(decenas);

    case 3: return "TRESCIENTOS " + Decenas(decenas);

    case 4: return "CUATROCIENTOS " + Decenas(decenas);

    case 5: return "QUINIENTOS " + Decenas(decenas);

    case 6: return "SEISCIENTOS " + Decenas(decenas);

    case 7: return "SETECIENTOS " + Decenas(decenas);

    case 8: return "OCHOCIENTOS " + Decenas(decenas);

    case 9: return "NOVECIENTOS " + Decenas(decenas);

  }

 

  return Decenas(decenas);

}//Centenas()

 

function Seccion(num, divisor, strSingular, strPlural){

  cientos = Math.floor(num / divisor)

  resto = num - (cientos * divisor)

 

  letras = "";

 

  if (cientos > 0)

    if (cientos > 1)

      letras = Centenas(cientos) + " " + strPlural;

    else

      letras = strSingular;

 

  if (resto > 0)

    letras += "";

 

  return letras;

}//Seccion()

 

function Miles(num){

  divisor = 1000;

  cientos = Math.floor(num / divisor)

  resto = num - (cientos * divisor)

 

  strMiles = Seccion(num, divisor, "MIL", "MIL");

  strCentenas = Centenas(resto);

 

  if(strMiles == "")

    return strCentenas;

 

  return strMiles + " " + strCentenas;

 

  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);

}//Miles()

 

function Millones(num){

  divisor = 1000000;

  cientos = Math.floor(num / divisor)

  resto = num - (cientos * divisor)

 

  strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");

  strMiles = Miles(resto);

 

  if(strMillones == "")

    return strMiles;

 

  return strMillones + " " + strMiles;

 

  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);

}//Millones()

 

function NumeroALetras(num,centavos){

  var data = {

    numero: num,

    enteros: Math.floor(num),

    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),

    letrasCentavos: "",

  };

  if(centavos == undefined || centavos==false) {

    data.letrasMonedaPlural="SOBERANOS";

    data.letrasMonedaSingular="SOBERANO";

  }else{

    data.letrasMonedaPlural="CENTIMOS";

    data.letrasMonedaSingular="CENTIMO";

  }

 

  if (data.centavos > 0)

    data.letrasCentavos = "CON " + NumeroALetras(data.centavos,true);

 

  if(data.enteros == 0)

    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;

  if (data.enteros == 1)

    return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;

  else

    return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;

}//NumeroALetras()

</script>