@extends('layouts.layout')
@section('title','CONFIGURACIÓN')
@section('panel_name','Configuración')
@section('panel_rigth','Configuración')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Configuración</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('configuracion.create')  }}" class="btn btn-info" >Agregar Configuración</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre Institucion</th>
               <th>Logo</th>
             </thead>
             <tbody>
              @if($configuraciones->count())  
              @foreach($configuraciones as $configuracion)  
              <tr>
                <td>{{$configuracion->id}}</td>
                <td>{{$configuracion->nombre}}</td>
                <td>
                  @if ($configuracion->logo=="images/logo.PNG")
                    POR DEFECTO
                    @else 
                    SI
                  @endif
                </td>
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('ConfiguracionController@show', $configuracion->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('ConfiguracionController@destroy', $configuracion->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA CONFIGURACIÓN?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $configuraciones->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection