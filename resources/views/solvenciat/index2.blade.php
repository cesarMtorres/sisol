@extends('layouts.layout')
@section('title','Solvencia Tecnica')

@section('css')

@endsection
@section('panel_name','Solvencia Tecnica') <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@section('panel_rigth','Solvencia Tecnica')
@section('content')
<div class="row">
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
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
      @endif
  <section class="content">
 

    <div class="col-md-12 col-xs-12">
   

 <div class="panel-group" id="accordionPrimary">
                <div class="panel panel-accordion panel-accordion-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" title="Click para Ver" data-toggle="collapse" data-parent="#accordionPrimary" href="#collapsePrimaryOne" style="background: #34495e">

                        LISTA CEPIR
                      </a>
                    </h4>
                  </div>
                  <div id="collapsePrimaryOne" class="accordion-body collapse">
                              <ul class="widget-todo-list">
                                    <ul class="list-unstyled">

                  


                    <li>
                      
                      

          <div class="table-container">

            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>N° de Contrato</th>
                 <th>Status</th>
                 <th>Monto</th>

             </thead>
             <tbody>
              @if($cepir->count())  
              @foreach($cepir as $key=> $auditoria)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$auditoria->ncontrato}}</td>


                 @if ($auditoria->status=="DEUDOR")

                 <td>
                   <span class="label label-warning">{{$auditoria->status}}</span>

                 </td>

                 @else 
                 <td>
                   <span class="label label-success">{{$auditoria->status}}</span> 
                 </td>

                  
                @endif
                  
                <td>
                <a title="Pagar" class="btn btn-xs btn-info" href="{{action('SolvenciatController@PagarCepir', $auditoria->id)}}" ><span class="icon icon-eye"></span>Pagar</a></td>

                 
               </tr>
               @endforeach
              
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
                      
                    </li>


               
                    




                  </ul>
                              </ul>
                  </div>
                </div>
              </div>
           

            
                 
      


 <div class="panel-group" id="accordionSecon">
                <div class="panel panel-accordion panel-accordion-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" title="Click para Ver" data-parent="#accordionSecon" href="#collapsePrimarySecon" style="background: #34495e">

                        LISTA VISADO
                      </a>
                    </h4>
                  </div>
                  <div id="collapsePrimarySecon" class="accordion-body collapse">
                              <ul class="widget-todo-list">
                                    <ul class="list-unstyled">

                  


                    <li>
                      
                      
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>

            
               <th>N°</th>
           
               <th>Fecha</th>
               <th>STATUS</th>
               <th>Accion</th>

             </thead>
             <tbody>
              <tr>
                 @foreach($visado as $key=>$visa)  
                <td>{{$visa->id}}</td>
               
                <td>{{$visa->created_at}}</td>

                 @if ($visa->status=="DEUDOR")

                 <td>
                   <span class="label label-warning">{{$visa->status}}</span>

                 </td>


              
                  
                 @else 
                 <td>
                   <span class="label label-success">{{$visa->status}}</span> 
                 </td>


               
                @endif
                
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('SolvenciatController@PagarVisado', $visa->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
              
                
               </tr>
                @endforeach
               <tr>
               <!-- <td colspan="8">No hay registro !!</td> -->
              </tr>
  
            </tbody>
 
          </table>
        </div>
                      
                    </li>


               
                    




                  </ul>
                              </ul>
                  </div>
                </div>
              </div>







    </div>


  </div>

   
   <div class="panel-group" id="accordionSecon1">
                <div class="panel panel-accordion panel-accordion-primary">
                  <div class="panel-heading" >
                    <h4 class="panel-title" >
                      <a class="accordion-toggle" data-toggle="collapse" title="Click para Ver" data-parent="#accordionSecon1" href="#collapsePrimarySecon1" style="background: #34495e">

                        LISTA SOLVENCIA TECNICAS (PAGADAS)
                      </a>
                    </h4>
                  </div>
                  <div id="collapsePrimarySecon1" class="accordion-body collapse">
                              <ul class="widget-todo-list">
                                    <ul class="list-unstyled">

                  


                    <li>
                      
                      
          <div class="table-container">
   <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar por: Nombre, Apellido, Civ, Cedula" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Datos Totales : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered" id="example">
       <thead>
        <tr>
         <th>Cedula</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Tipo de Certificado</th>
        </tr>
       </thead>
       <tbody name="vamo" id="vamo">

       </tbody>
      </table>
     </div>
    </div>    
   </div>
        </div>
                      
                    </li>


               
                    




                  </ul>
                              </ul>
                  </div>
                </div>
              </div>







    </div>


  </div>
</section>








@endsection
 @section('js')

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
