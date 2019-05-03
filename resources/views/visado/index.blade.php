@extends('layouts.layout')
@section('title','VISADO')
@section('panel_name','Visado')
@section('panel_rigth','Visado')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Visado</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
           <!--   <a title="Nuevo Registro" href="" class="btn btn-info" >Agregar</a> -->
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>Nombre del Agremiado</th>
               <th>Civ</th>
               <th>Fecha</th>
               <th>Instituto</th>
               <th>Accion</th>

             </thead>
             <tbody>
              <tr>
                <td>1</td>
                <td>PEDRO GALINDEZ</td>
                <td>123</td>
                <td>03-05-2019</td>
                <td>CONSTRUC 2000</td>
                <td><a title="Ver" class="btn btn-xs btn-info" href="#" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL VISADO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

                 </td> 
               </tr>
               <tr>
               <!-- <td colspan="8">No hay registro !!</td> -->
              </tr>
  
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