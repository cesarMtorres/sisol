 @extends('layouts.layout')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Auditoria</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{ route('plano.create') }}" class="btn btn-info" >Agregar</a> 
            </div>
<!--                <form class="form-inline">
              <input type="text" name="" placeholder="Buscar" class="form-control rm-sm-2">
              <button class="btn btn-success" type="submit">Buscar</button>
              </form>-->
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>N°</th>
               <th>Civ</th>
               <th>Nombre Ingeniero</th>
               <th>Nombre del Proyecto</th>
               <th>Fecha Registrado</th>
             </thead>

              <tr>
                <td>2301</td>
                <td>Cesar Molina</td>
                <td>plaza la palomas en la urb la pastora sector tricentenaria</td>
                <td>2019/03/25</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL AGREMIADO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

                 </td> 
               </tr>
               <tr>
             <!--   <td colspan="8">No hay registro !!</td> -->
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