
@extends('layouts.layout')
@section('title','INSTITUTO')
@section('panel_name','Instituto')
@section('panel_rigth','Instituto')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
        <div class="panel-heading" >
          <h3 class="panel-title">Nuevo Instituto</h3>
        </div>


          <a title="Nuevo Registro" href="{{ route('instituto.create') }}" class="btn btn-info" >Agregar Instituto</a>
          <!-- BUSCADOR DE INSTITUTO-->

          <form action="{{ route('instituto.index') }}" class="navbar-form pull-right" method="get">
            <div class="input-group">

              <input type="text" class="form-control" name="name" placeholder="Buscar ">
              <span class="input-group-addon" id="search"><span class="fa fa-search" arial-hidden="true" id="search"> </span></span>
            </div> 
          </form>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>

             </thead>
             <tbody>
              @if($institutos->count())  
              @foreach($institutos as $instituto)  
              <tr>
                <td>{{$instituto->id}}</td>
                <td>{{$instituto->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('InstitutoController@show', $instituto->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('InstitutoController@destroy', $instituto->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL INSTITUTO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection