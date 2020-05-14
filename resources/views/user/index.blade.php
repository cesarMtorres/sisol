@extends('layouts.layout')
@section('title','USER')
@section('panel_name','User')<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('panel_rigth','User')
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
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Usuarios</h3>
     <a href="{{ action('UsersController@imprimir') }}" class="btn btn-danger">Imprimir</a>
    
          </div>
        </div>
        </div>
       
          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">Buscar</a>
              <a title="Nuevo Registro" href="{{  route('user.create')  }}" class="btn btn-success" >Agregar</a>
            </div>
          </div>


<!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
       

 <div class="table-container">
        
   <h3 align="center"></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Buscar Usuario</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar por : Nombre , Correo" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Datos Totales : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Nombre</th>
          <th>Correo</th>
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
</div>





          

          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>Usuario</th>
               <th>Correo</th>

             </thead>
             <tbody>
              
              @foreach($users as $key=>$muestra)  
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$muestra->name}}</td>
                <td>{{$muestra->email}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('UsersController@show', $muestra->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>

              
               <td>
                  <form action="{{action('UsersController@destroy', $muestra->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL USUARIO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button></form>

                 </td> 
               </tr>
               @endforeach 
               
               
            </tbody>
 
          </table>
        </div>
      </div>
      <div class="text-center">
        
      
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
   url:"{{ route('user.action') }}",
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
