@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Agremiado</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{ route('agremiado.create') }}" class="btn btn-info" >Agregar Agremiado</a> 
            </div>
<!--                <form class="form-inline">
              <input type="text" name="" placeholder="Buscar" class="form-control rm-sm-2">
              <button class="btn btn-success" type="submit">Buscar</button>
              </form>-->
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre y Apellido</th>
               <th>Civ</th>
               <th>Codigo</th>
               <th>Solvencia</th>
               <th>Especialidad</th>
               <th>Cedula</th>
               <th>telefono</th>
               <th>Direccion</th>
             </thead>
             <tbody>
              @if($agremiados->count())  
              @foreach($agremiados as $agremiado)  
              <tr>
                <td>{{$agremiado->nombre}}</td>
                <td>{{$agremiado->civ}}</td>
                <td>{{$agremiado->codigo}}</td>
                <td>{{$agremiado->solvencia}}</td>
                <td>{{$agremiado->especialidad}}</td>
                <td>{{$agremiado->cedula}}</td>
                <td>{{$agremiado->telefono}}</td>
                <td>{{$agremiado->direccion}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('AgremiadoController@show', $agremiado->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('AgremiadoController@destroy', $agremiado->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL AGREMIADO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $agremiados->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>
 
@endsection