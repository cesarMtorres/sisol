@extends('especialidad.create')
@extends('layouts.layout')
@section('title','EMPRESA')
@section('panel_name','Empresa')
@section('panel_rigth','Empresa')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Empresa</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
         <!--       <a title="Nuevo Registro" href="" class="btn btn-info" >Agregar Universidad</a> -->

               <a class="modal-basic btn btn-info" href="#Crearmodal">Agregar</a>

            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>N°</th>
               <th>Nombre</th>

             </thead>

              <tr>
                <td>1</td>
                <td>CARRETECNO SA</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="" method="post">
                   @csrf
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR LA EMPRESA?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

                 </td> 
               </tr>
               <tr>
                <td colspan="8">No hay registro !!</td>
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