@extends('layouts.layout')
@section('title','ESPECIALIDAD')
@section('panel_name','Especialidad')
@section('panel_rigth','Especialidad')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Especialidad</h3>
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
    
          </div>
        </div>
        </div>
       
          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">Buscar</a>
              <a title="Nuevo Registro" href="{{  route('especialidad.create')  }}" class="btn btn-success" >Agregar</a>
            </div>
          </div>


<!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
        <div class="modal-content"  align="left" >
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left">&times;</button>
                <table id="mytable" class="table table-bordred table-striped" >
             <thead>
             <form action="" class="navbar-form pull-right" method="get">
            <div class="input-group">
            <tr>
              <td>
            <input type="text" class="form-control" name="name" placeholder="Buscar ">
              </td>            
              <td>
               <button type="submit" class="search"> <span class="input-group-addon" id="search" ><span class="fa fa-search" arial-hidden="true" id="search"> </span></span></button>
             </td></tr>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left"></button>           
            </div> 
          </form>     
               <th>Nombre</th>
             </thead>
             <tbody>
              @if($especialidades->count())  
              @foreach($especialidades as $especialidad)  
              <tr>
                <td>{{$especialidad->nombre}}</td>
                <td></td>        
                 </td> 
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!----------------------- Termina Modal ----------------------------------------->

          

          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>

             </thead>
             <tbody>
              @if($especialidades->count())  
              @foreach($especialidades as $key=>$especialidad)  
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$especialidad->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('EspecialidadController@show', $especialidad->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('EspecialidadController@destroy', $especialidad->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA ESPECIALIDAD?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button></form>

                 </td> 
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
      </div>
      <div class="text-center">
        <li class="page-item">{{ $especialidades->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection