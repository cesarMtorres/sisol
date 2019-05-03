@extends('layouts.layout')
@section('title','TARIFA')
@section('panel_name','Tarifa')
@section('panel_rigth','Tarifa')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Tarifa</h3>
          <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
          </div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left"    >Buscar</a>
              <a title="Nuevo Registro" href="{{  route('tarifa.create')  }}" class="btn btn-success" >Agregar</a>
            </div>
          </div>
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
              <input type="text" class="form-control" name="nombre" placeholder="Buscar " pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">

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

              @if($tarifas->count())  
              @foreach($tarifas as $tarifa)  
              <tr>
                <td>{{$tarifa->nombre}}</td>
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
               <th>Monto</th>
               <th>Fecha Inicio</th>
               <th>Fecha Fin</th>
             </thead>
             <tbody>
              @if($tarifas->count())  
              @foreach($tarifas as $key=>$tarifa)  
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$tarifa->nombre}}</td>
                <td>{{$tarifa->monto}} Bs.S</td>
                <td>{{$tarifa->fecha_ini}}</td>
                <td>{{$tarifa->fecha_fin}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('TarifaController@show', $tarifa->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('TarifaController@destroy', $tarifa->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA TARIFA?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>
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
        <li class="page-item">{{ $tarifas->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection