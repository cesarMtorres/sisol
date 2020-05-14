@extends('layouts.layout')
@section('title','Solvencia Administrativa')
@section('panel_name','Solvencia Administrativa') <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@section('panel_rigth','Solvencia Administrativa')
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
   
        <div class="panel-body">


          <div class="panel-heading">

          <div class="panel-tittle">
             <a href="{{action('SolvenciaController@imprimir')}}" class="btn btn-danger">Imprimir</a>

          <div class=""><h3>Lista Solvencia </h3>

         
           </div>

        </div>

        </div>
                
       

           <div class="table-container">
        
   <h3 align="center"></h3><br />
   <div class="panel panel-default">
  
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Registros totales : <span id="total_records"></span></h3> 
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Cedula</th>
         <th>Nombres</th>
         <th>Apellidos</th>
         <th>CIV</th>
          <th>Status</th>
          <th>Acción</th>
        </tr>
       </thead>
       <tbody name="vamo" id="vamo">

       </tbody>
      </table>
     </div>
    </div>    
   </div>

          </div>
      </div>
      <div class="text-center">
        <li class="page-item"> </a></li>
      
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
   url:"{{ route('solvenciaadmin.action') }}",
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




