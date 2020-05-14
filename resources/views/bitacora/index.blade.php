@extends('layouts.layout')
@section('title','BITACORA')
@section('panel_name','Bitácora')
@section('panel_rigth','Bitácora')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3 align="center">Historial</h3></div>
        </div>
        </div>

         <form action="{{ route('bitacora.index') }}" class="navbar-form pull-right" method="get">
            <div class="input-group">

              <input type="text" class="form-control" name="name" placeholder="Buscar ">
              <span class="input-group-addon" id="search"><span class="fa fa-search" arial-hidden="true" id="search"> </span></span>
            </div> 
          </form>
       
                 

          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Item</th>
               <th>Acción</th>
              <th>Fecha y Hora</th>
               <th>Tabla</th>

             </thead>
             <tbody>
              @if($especialidades->count())  
              @foreach($especialidades as $key=>$especialidad) 
              
              <tr>
                <td>{{$key=$key+1}}</td>

                <td>{{$especialidad->accion}}</td>
                
                <td>{{$especialidad->fecha_hora}}</td>
                <td>{{$especialidad->tabla}}</td>
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
      <div class="text-center">
        <li class="page-item">{{ $especialidades->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection