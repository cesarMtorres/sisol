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
          <div class=""><h3>Lista Tarifa</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('tarifa.create')  }}" class="btn btn-info" >Agregar Tarifa</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th>Monto</th>
               <th>Fecha Inicio</th>
               <th>Fecha Fin</th>
             </thead>
             <tbody>
              @if($tarifas->count())  
              @foreach($tarifas as $tarifa)  
              <tr>
                <td>{{$tarifa->id}}</td>
                <td>{{$tarifa->nombre}}</td>
                <td>{{$tarifa->monto}}</td>
                <td>{{$tarifa->fecha_ini}}</td>
                <td>{{$tarifa->fecha_fin}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('TarifaController@show', $tarifa->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('TarifaController@destroy', $tarifa->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA TARIFA?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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