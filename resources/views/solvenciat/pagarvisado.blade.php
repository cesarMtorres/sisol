@extends('layouts.layout')
@section('title','SOLVENCIA | TECNICA')
@section('panel_name','Solvencia') <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->

        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"> 
    <style type="text/css">
        /* Latest compiled and minified CSS included as External Resource*/
 
/* Optional theme */

/*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
 body {
    margin-top:30px;
}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 80%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;

}
    </style>

     <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
@section('panel_rigth','Solvencia')
@section('content')   
<!--


                SOLVENCIA TECNICA

-->


             


<div class="container" style="width: 800px">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Agremiado</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Monto</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Confirmacion</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Recibo</small></p>
            </div>
        </div>
    </div>
    
     <form method="POST" class="form-horizontal" action="{{ route('solvenciat.store') }}" role="form">
     @csrf
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading" style="background: #34495e">
                 <h3 class="panel-title">Agremiado</h3>
            </div>
            <div class="panel-body">
                              <div class="form-group">

<div class="col-md-8 col-sm-8">
                  <label>Cedula Agremiado</label>
                      <div class="form-inline">
                      
                      @foreach($persona as $personaita)
         @foreach($personaita->personas as $per)
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" readonly="readonly"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$per->cedula}}">
                    <input type="hidden" name="agremiado_id" value="{{$agremiados->id}}">
                    
                     @endforeach
                      @endforeach

                     <input type="hidden" id="tipo_certificado" name="tipo_certificado" value="VISADO">

                        <input type="hidden" id="visado_id" name="visado_id" value="{{$visado->id}}">
                     
                   
                  </div>
</div>



 </div>
                <br>
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading" style="background: #34495e">
                 <h3 class="panel-title">Monto</h3>
            </div>
            <div class="panel-body">
                 <div class="form-group">



                             <div class="row">
                          
                        
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div id="precio" class="form-inline">
                    <label>Monto</label>
                    <input type="text" name="monto" id="monto" OnkeyPress="return SoloNumeros(event)" maxlength="20" required="required" class="form-control input-sm" value="" style="width: 250px">
                  </div>
                </div>
                </div>
                 
                      </div>
                <br>
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading" style="background: #34495e">
                 <h3 class="panel-title">Confirmacion</h3>
            </div>
            <div class="panel-body">
                
            <div class="row">
              <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading" style="background: #34495e">
            
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
                    
                            <td>{{$agremiados->civ}}</td>
                          @foreach($persona as $personaita)
         @foreach($personaita->personas as $per)
                            <td>{{$per->nombre}}</td>
                            <td>{{$per->apellido}}</td>
                            <td>{{$per->cedula}}</td>
                           
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
                  <header class="panel-heading" style="background: #34495e">
            
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
                            <td><P>VISADO</P></div></td>
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
                          <input type="text" name="descripcion" id="descripcion" class="form-control" maxlength="50">
                        </div>
                         <div class="col-md-6">
                        <label class="control-label">Tipo de Pago</label>
                          <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 100%;" name="tipo_pago_id" >
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
                     <select class="form-control input-sm"  data-placeholder="seleccione" style="width: 100%;" name="banco_id" id="banco_id">
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
                          <input type="text" name="referencia" id="referencia"  class="form-control" maxlength="20">
                        </div>
                          </div>
                <br>
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguente</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading" style="background: #34495e">
                 <h3 class="panel-title">Recibo</h3>
            </div>
            <div class="panel-body">
                <div class="grid-container" >
    <div class="row" >
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" >
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p align="left">
                        <em >Fecha: {{$mytime->format('d-m-Y')}}</em>
                    </p>
               @foreach($persona as $personaita)
         @foreach($personaita->personas as $per)
                            <p align="left">
                           <em>CIV: {{$agremiados->civ}}</em>
                            </p>
                            <p align="left">
                           <em>Agremiado: {{$per->nombre}}</em><em> {{$per->apellido}}</em></p>
                            <p align="left">
                           <em>Cedula: {{$per->cedula}}</em>
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
                            <th></th>
                            <th></th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td  class="col-md-4"><div name="tipo_cer_2" id="tipo_cer_2"></div></td>
                            
                             <td class="col-md-4"></td>
                            <td class="col-md-1 text-center"></td>
                           <td class="col-md-1 text-center"><div name="monto22" id="monto22"></div></td>
                        </tr>
                  
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>1% del sueldo: </strong>
                            </p>
                            </td>
                            <td class="text-center">
                            <p>
                                <strong><div name="monto2" id="sutotal"></div></strong>
                            </p>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total a Pagar: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><div name="monto2" id="totalsueldo"></div></strong></h4></td>
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
        <br>
                <button class="btn btn-primary pull-right" type="submit">Registrar</button>
    </div>    

                
                </div>
                </div></div></div>
            </div>
        </div>
    </form>
</div>
@endsection

    @section('js')
<script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});

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
             var stotal=value*1;
            var sutotal=stotal/100;
             var total=parseInt(value)+parseInt(sutotal);

            $("#monto2").html(value);

            $("#monto22").html(value);
            $("#sutotal").html(sutotal);
             $("#totalsueldo").html(sutotal);
            
        });
    });
    


</script>




      <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
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

document.getElementById('cadera').style.display = 'block';

}

function ocultar(){

document.getElementById('cadera').style.display = 'none';

}

</script>
