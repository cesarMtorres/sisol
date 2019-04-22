@extends('layouts.layout')
@section('title','AUDITORIA')
@section('panel_name','Auditoria')
@section('panel_rigth','Auditoria')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Auditoria</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{ route('auditoria.create')  }}" class="btn btn-info" >Agregar Auditoria</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre del proyecto</th>
               <th>Codigo</th>
               <th>Fecha</th>
               <th>Estado</th>
               <th>Accion</th>

             </thead>
             <tbody>
              @if($auditorias->count())  
              @foreach($auditorias as $auditoria)  
              <tr>
                <td>{{$auditoria->id}}</td>
                <td>{{$auditoria->nombre}}</td>
                <td>{{$auditoria->codigo}}</td>
                <td>{{$auditoria->created_at}}</td>
                <td>
                @if ($auditoria->status=="AUDITANDO")
                  <span class="label label-warning">{{$auditoria->status}}</span>
                 @elseif ($auditoria->status=="APROVADO")
                  <span class="label label-success">{{$auditoria->status}}</span>
                @else
                  <span class="label label-danger">{{$auditoria->status}}</span>
                @endif
              </td>
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('AuditoriaController@show', $auditoria->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('AuditoriaController@destroy', $auditoria->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA AUDITORIA?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $auditorias->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection