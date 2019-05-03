
@extends('layouts.layout')
@section('title','INSTITUTO')
@section('panel_name','Instituto')
@section('panel_rigth','Instituto')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <div class="panel-heading" >
          <h3 class="">Listar Instituto</h3>
           <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
        </div>
 


          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">Buscar</a>
              <a title="Nuevo Registro" href="{{  route('instituto.create')  }}" class="btn btn-success" >Agregar</a>
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
            <input type="text" class="form-control" name="nombre" pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required">
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
              @if($institutos->count())  
              @foreach($institutos as $instituto)  
              <tr>
                <td>{{$instituto->nombre}}</td>
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

             </thead>
             <tbody>
              @if($institutos->count())  
              @foreach($institutos as $key=>$instituto)  
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$instituto->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('InstitutoController@show', $instituto->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('InstitutoController@destroy', $instituto->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL INSTITUTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>
                 </form>
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
        <li class="page-item">{{ $institutos->links() }}</a></li>
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection