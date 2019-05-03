@extends('layouts.layout')
@section('title','PROYECTO')
@section('panel_name','Proyecto')
@section('panel_rigth','Proyecto')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Proyecto</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('proyecto.create')  }}" class="btn btn-info" >Agregar</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>Nombre</th>

             </thead>
             <tbody>
              @if($proyectos->count())  
              @foreach($proyectos as $key=>$proyecto)  
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$proyecto->id}}</td>
                <td>{{$proyecto->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('ProyectoController@show', $proyecto->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('ProyectoController@destroy', $proyecto->id)}}" method="post">
                   @csrf
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL PROYECTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $proyectos->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection