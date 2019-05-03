 @extends('layouts.layout')
@section('title','CARGA FAMILIAR')
@section('panel_name','Carga Familiar')
@section('panel_rigth','Carga Familiar')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Carga Familiar</h3></div>
           <a href="{{ route('app.excel.download') }}" class="btn btn-primary" id="btnDescargar" style="padding:4px 10px;">Imprimir</a>
             </div>

        </div>

        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a class="btn btn-primary" href="#">Buscar</a>
              <a title="Nuevo Registro" href="{{ route('agremiado.create') }}" class="btn btn-success" >Agregar</a> 
            </div>

          </div>

        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>N°</th>
              <th>Civ</th>
               <th>Cedula</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Teléfono</th>
             </thead>
             <tbody>
              @if($cfamiliares->count())  
              @foreach($cfamiliares as $key => $cfamiliar)
              @foreach($cfamiliar->personas as $persona)
              <tr>
                <td>{{$key+1 }}</td>
                <td>{{$cfamiliar->fecha_nac }}</td>
                <td>{{$persona->cedula}}</td>
                <td>{{$persona->nombre}}</td>
                 <td>{{$persona->apellido}}</td>
                <td>{{$persona->telefono}}</td>
                
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('AgremiadoController@show', $agremiado->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('AgremiadoController@destroy', $agremiado->id)}}" method="post">
                   @csrf
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL AGREMIADO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>
                   </form>
                 </td> 
               </tr>
               @endforeach
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
      <div class="pagination pull-right">
        <li class="page-item"></a></li>
      </div>
    </div>
  </div>
</section>


@endsection