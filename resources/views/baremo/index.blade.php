@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endsection
@section('title','INSTRUMENTO')
@section('panel_name','Instrumento')
@section('panel_rigth','Instrumento')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Instrumento (Baremos)</h3>
          <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
          </div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">Buscar</a>
              <a title="Nuevo Registro" href="{{  route('baremo.create')  }}" class="btn btn-success" >Agregar</a>
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
            <input type="text" class="form-control" name="nombre" pattern=".{0}|.{3,20}" title="Requiere minimo de (3 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="20" required="required">
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
              @if($instrumentos->count())  
              @foreach($instrumentos as $instrumento)  
              <tr>
                <td>{{$instrumento->nombre}}</td>
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
               <th>N°</th>
               <th>Nombre</th>
               <th>Descripcion</th>

             </thead>
             <tbody>
              @if($instrumentos->count())  
              @foreach($instrumentos as $key=>$baremo)  
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$baremo->nombre}}</td>
                <td>{{ $baremo->descripcion }}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('InstrumentoController@show', $baremo->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('InstrumentoController@destroy', $baremo->id)}}" method="post">
                   @csrf
                   @method("DELETE")
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL INSTRUMENTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $instrumentos->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>
@endsection