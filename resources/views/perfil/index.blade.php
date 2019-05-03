@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endsection
@section('title','PERFIL')
@section('panel_name','Perfil')
@section('panel_rigth','Perfil')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Perfil</h3>
          <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
          </div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">Buscar</a>
              <a title="Nuevo Registro" href="{{  route('perfil.create')  }}" class="btn btn-success" >Agregar</a>
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
              @if($perfiles->count())  
              @foreach($perfiles as $perfil)  
              <tr>
                <td>{{$perfil->nombre}}</td>
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
               <th>Estado</th>
               <th>Nivel</th>
             </thead>
             <tbody>
              @if($perfiles->count())  
              @foreach($perfiles as $key=>$perfil)  
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$perfil->nombre}}</td>
                <td>
                @if ($perfil->status==1)
                  <span class="label label-success">ACTIVADO</span>
                 @elseif ($perfil->status==0)
                  <span class="label label-danger">DESACTIVADO</span>
                @else
                  <span class="label label-danger">NO HAY REGISTRO</span>
                @endif
              </td>
              <td>
                @if ($perfil->nivel==1)
                  <span class="label label-info">PREDETERMINADO</span>
                 @elseif ($perfil->nivel==2)
                  <span class="label label-success">ADMINISTRADOR</span>
                @else
                  <span class="label label-danger">NO HAY REGISTRO</span>
                @endif
              </td>
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('PerfilController@show', $perfil->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('PerfilController@destroy', $perfil->id)}}" method="post">
                   @csrf
                   @method("DELETE")
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL PERFIL?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>
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
      <div class="pagination">
        <li class="page-item"></a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>
@endsection