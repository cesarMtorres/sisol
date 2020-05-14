@extends('layouts.layout')
@section('title','SOLVENCIA | TECNICA')
@section('panel_name','Solvencia') <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('panel_rigth','Solvencia')
@section('content')   
<!--


                SOLVENCIA TECNICA

--> 


              <div class="col-xs-12">
                <section class="panel form-wizard" id="w4">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>

                    </div>
            
                    <h2 class="panel-title">Solvencia Tecnica</h2>
                  </header>
                  <div class="panel-body">
                    <div class="wizard-progress wizard-progress-lg">
                      <div class="steps-progress">
                        <div class="progress-indicator"></div>
                      </div>
                      <ul class="wizard-steps">
                        <li class="active">
                          <a href="#w4-account2" data-toggle="tab"><span>1</span>Agremiado</a>
                        </li>
                        <li>
                          <a href="#w4-profile2" data-toggle="tab"><span>2</span>Tipo Certificado</a>
                        </li>
                        <li>
                          <a href="#w4-billing2" data-toggle="tab"><span>3</span>Confirmar Pago</a>
                        </li>
                        <li>
                          <a href="#w4-confirm2" data-toggle="tab"><span>4</span>infromacion</a>
                        </li>
                      </ul>
                    </div>
            
                    <form method="POST" class="form-horizontal" action="{{ route('solvenciat.store') }}" role="form">
                     @csrf
                

                      <div class="tab-content">
                        <div id="w4-account2" class="tab-pane active">
                          <div class="form-group">

<div class="col-md-8 col-sm-8">
                  <label>Cedula Agremiado</label>
                      <div class="form-inline">
                      @foreach($agremiados as $personita)
                      @foreach($personita->personas as $vamo)
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" readonly="readonly"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$vamo->cedula}}">
                    <input type="hidden" name="agremiado_id" value="{{$personita->id}}">
                      @endforeach
                      @endforeach
                   
                  </div>
</div>



 </div>
                        </div>
                        <div id="w4-profile2" class="tab-pane">
                          <div class="form-group">



                             <div class="row">
                          
                            <div id="tipocertificado" class="col-xs-6 col-sm-6 col-md-6">
    

<label for="">Cepir</label> 
<input type="radio" name="tipo_certificado" id="tipo_certificado" value="Cepir" onclick="ocultar()" >
 <label for="">Visado</label>
 <input type="radio" name="tipo_certificado" id="tipo_certificado" value="Visado" onclick="mostrar()" checked="checked">

 <div id="medida">

       Ingrese las medida (Metro cuadrado)
      <input type="text" name="medida" id="medida" class="form-control" >
                            </div>
 
</div>
 
<div id="desdeotro" style="display:none;">
<p>Referencia de la oferta:</p>
<p><input type="text" name="otro" class="input" class="form-control" /></p>
</div>

                        
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div id="precio" class="form-group">
                    <label>Monto</label>
                    <input type="text" name="monto" id="monto" OnkeyPress="return SoloNumeros(event)" maxlength="20" class="form-control input-sm" value="" style="width: 250px">
                  </div>
                </div>
                </div>
                
              


                        <br></br>



                       
                      </div>
                      </div>
                        <div id="w4-billing2" class="tab-pane">

            <div class="row">
              <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
            
                    <h2 class="panel-title">Agremiado</h2>
                  </header>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table mb-none">
                        <thead>
                          <tr>
                            <th>Civ</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                        
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                           @foreach($agremiados as $personita)
                      @foreach($personita->personas as $vamo)
                            <td>{{$personita->civ}}</td>
                            <td>{{$vamo->nombre}}</td>
                            <td>{{$vamo->apellido}}</td>
                            <td>{{$vamo->cedula}}</td>
                            @endforeach
                            @endforeach
                       
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </section>
              </div>
             <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
            
                    <h2 class="panel-title">Certificación</h2>
                  </header>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table mb-none">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Monto</th>
                        
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><div name="tipo_cer" id="tipo_cer"></div></td>
                            <td><div name="monto2" id="monto2"></div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                   

                  </div>
              </div>
            </div>



       <div class="row">
                          <div class="col-md-6">
                          <label class="control-label">Descripción</label>
                          <input type="text" name="descripcion" id="descripcion" class="form-control">
                        </div>
                         <div class="col-md-6">
                        <label class="control-label">Tipo de Pago</label>
                         <select class="form-control" multiple="multiple" data-plugin-multiselect id="ms_example0" name="tipo_pago_id">
                             @if(count($tipo_pago))
                        @foreach($tipo_pago as $tipop)
                            <option value="{{ $tipop->id }}">{{ $tipop->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen tipos de pagos</option>
                      @endif
                          </select>
                        </div>
                      </div>
                      <div class="row">
                                

                         <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Banco</label>
                     <select class="form-control input-sm"  data-placeholder="seleccione" style="width: 70%;" name="banco_id" id="banco_id">
                      @if(count($banco))
                        @foreach($banco as $bancos)
                            <option value="{{ $bancos->id }}">{{ $bancos->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen bancos</option>
                      @endif
                    </select>
                </div>                    

                        
                      
                        <div class="col-md-6 col-xs-6 col-sm-6">
                        <label>Referencia</label>
                          <input type="text" name="referencia" id="referencia"  class="form-control">
                        </div>
                          </div>
                        </div>


  
                        <div id="w4-confirm2" class="tab-pane">


<div class="grid-container" >
    <div class="row" >
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" >
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p align="left">
                        <em >Fecha: {{$mytime->format('d-m-Y')}}</em>
                    </p>
                    @foreach($agremiados as $personita)
                      @foreach($personita->personas as $vamo)
                            <p align="left">
                           <em>CIV: {{$personita->civ}}</em>
                            </p>
                            <p align="left">
                           <em>Agremiado: {{$vamo->nombre}}</em><em> {{$vamo->apellido}}</em></p>
                            <p align="left">
                           <em>Cedula: {{$vamo->cedula}}</em>
                            </p>
                            @endforeach
                            @endforeach
                       
                    
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Recibo</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Certificado</th>
                            <th>Año</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td  class="col-md-4"><div name="tipo_cer_2" id="tipo_cer_2"></div></td>
                            
                             <td class="col-md-4"><em>2018</em></h4></td>
                            <td class="col-md-1 text-center">100 bs S</td>
                           <td class="col-md-1 text-center"><div name="monto22" id="monto22"></div></td>
                        </tr>
                  
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>1200 bs S</strong>
                            </p>
                            <p>
                                <strong>1650 bs S</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                        </tr>
                                                <tr>
                          <td>    </td>
                          <td>    </td>
                          <td>    </td>
                          <td class="text-right">
                                    <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox"  id="todoListItem1" class="todo-check">
                                    <label class="todo-label" for="todoListItem1"><span><strong>Enviar Correo</strong></span></label>
                                  </div>
                          </td>
                        </tr>
                    </tbody>
                </table>
               
                 
            
        </div>
    </div>    



                        </div>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                </button>
                      </div>
                    </form>
                  </div>
                  <div class="panel-footer">
                    <ul class="pager">
                      <li class="previous disabled">
                        <a><i class="fa fa-angle-left"></i>Anterior</a>
                      </li>
                      <li class="finish hidden pull-right">
                        <a>Finalizar</a>
                      </li>
                      <li class="next">
                        <a>Siguiente <i class="fa fa-angle-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </section>
              </div>





                  <div id="catalogoAgremiado" class="modal-block mfp-hide">
                    <section class="panel">
                      <header class="panel-heading">
                        <h2 class="panel-title">Catalogo</h2>
                      </header>
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





@endsection

    @section('js')
      <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
      <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
 
    <script src="{{asset('assets/assets/javascripts/forms/examples.wizard.js')}} "></script>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('solvenciatec.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#vamo').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});

  $(document).ready(function () {
        $("#monto").keyup(function () {
            var value = $(this).val();
        //   var algo= document.getElementById("monto2");

            $("#monto2").html(value);

            $("#monto22").html(value);
            
        });
    });

    


</script>
    @endsection

    <script type="text/javascript">
<!--
function mostrarReferencia(){

if (document.Conocido[1].checked == true) {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='block';
//por el contrario, si no esta seleccionada
} else {
//oculta el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='none';
}
}
-->


function mostrar(){

document.getElementById('medida').style.display = 'block';

document.getElementById('tipo_cer').innerHTML="VISADO";

document.getElementById('tipo_cer_2').innerHTML="VISADO";



}

function ocultar(){

document.getElementById('medida').style.display = 'none';
document.getElementById('tipo_cer').innerHTML="CEPIR";

document.getElementById('tipo_cer_2').innerHTML="CEPIR";

}

</script>