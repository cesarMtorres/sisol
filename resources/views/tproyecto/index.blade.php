@extends('layouts.layout')
@section('title','PROYECTO')
@section('panel_name','Tipo Proyecto')
@section('panel_rigth','TipoProyecto')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Tipo Proyecto</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('tproyecto.create')  }}" class="btn btn-info" >Agregar Tipo Proyecto</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th></th>
             </thead>
             <tbody>
              @if($tproyectos->count())  
              @foreach($tproyectos as $tproyecto)  
              <tr>
                <td>{{$tproyecto->id}}</td>
                <td>{{$tproyecto->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('TipoProyectoController@show', $tproyecto->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('TipoProyectoController@destroy', $tproyecto->id)}}" method="post">
                   {{csrf_field()}}
                   <!-- <input name="_method" type="hidden" value="DELETE"> -->
                   @method('DELETE')
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL TIPO PROYECTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $tproyectos->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection