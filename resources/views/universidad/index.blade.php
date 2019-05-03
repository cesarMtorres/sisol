@extends('layouts.layout')
@section('title','UNIVERSIDAD')
@section('panel_name','Universidad')
@section('panel_rigth','Universidad')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Universidad</h3>       
     <a href="{{ url('dynamic_pdf/pdf')}}" class="btn btn-danger">Imprimir</a>

          </div>

        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="#victorModal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left"    >Buscar</a>
              <a title="Nuevo Registro" href="{{  route('universidad.create')  }}" class="btn btn-info" >Agregar</a>
            </div>
          </div>

<!--------------------------- Modal ------------------------------------------->

          <!-- Botón en HTML (lanza el modal en Bootstrap) -->




  
<!-- Modal / Ventana / Overlay en HTML -->
<div id="victorModal" class="modal fade" align="left">
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
              @if($universidades->count())  
              @foreach($universidades as $universidad)  
              <tr>
                <td>{{$universidad->nombre}}</td>
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
<!--  -->

        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>Nombre</th>

             </thead>
             <tbody>
              @if($universidades->count())  
              @foreach($universidades as $key=> $universidad)  
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$universidad->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('UniversidadController@show', $universidad->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('UniversidadController@destroy', $universidad->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA UNIVERSIDAD?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
      <div class="pagination">
        <li class="page-item">{{ $universidades->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection