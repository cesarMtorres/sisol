@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Auditoria</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{ route('plano.create') }}" class="btn btn-info" >Nuevo</a> 
            </div>
<!--                <form class="form-inline">
              <input type="text" name="" placeholder="Buscar" class="form-control rm-sm-2">
              <button class="btn btn-success" type="submit">Buscar</button>
              </form>-->
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Civ</th>
                <th>Nombre Ingeniero</th>
               <th>Nombre del proyecto</th>
               <th>Fecha registro</th>
               <th>Fecha Modificacion</th>
               <th>Estado</th>
             </thead>
             <tbody>
              @if($planos->count())  
              @foreach($planos as $plano)  
              <tr>
                <td>12321</td>
                <td>cesar molina</td>
                <td>plaza bolivar en la urb laa pastora sector tricentenaria</td>
                <td>2019-03-24</td>
                <td>2019-03-12</td>
                <td>
                    <span class="label label-success">ACTIVO</span>
                </td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('AgremiadoController@show', $plano->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('PlanoController@destroy', $plano->id)}}" method="post">
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
        @if ($planos->count())
        <li class="page-item">{{ $plano->paginate() }}</a></li>
        @endif
    </div>
    </div>
  </div>
</section>
 
@endsection