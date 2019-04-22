@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/assets/vendor/pnotify/pnotify.custom.css') }}" />
@endsection
@section('title','INSTRUMENTO')
@section('panel_name','Instrumento')
@section('panel_rigth','Instrumento')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Instrumento (Baremos)</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('baremo.create')  }}" class="btn btn-info" >Agregar Instrumento</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>

             </thead>
             <tbody>
              @if($baremos->count())  
              @foreach($baremos as $baremo)  
              <tr>
                <td>{{$baremo->id}}</td>
                <td>{{$baremo->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('EspecialidadController@show', $baremo->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('EspecialidadController@destroy', $baremo->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL INSTRUMENTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <button id="default-primary" class="mt-sm mb-sm btn btn-primary">TEST</button>
        <li class="page-item">{{ $baremos->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/vendor/pnotify/pnotify.custom.js') }}"></script>
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>
@endsection