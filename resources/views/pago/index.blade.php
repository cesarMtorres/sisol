@extends('layouts.layout')
@section('title',' PAGO')
@section('panel_name',' Pago')
@section('panel_rigth',' Pago')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Pago</h3></div>
        </div>
        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a title="Nuevo Registro" href="{{  route('pago.create')  }}" class="btn btn-info" >Agregar Pago</a>
            </div>
          </div>


        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Id</th>
               <th>Nombre</th>
               <th></th>
             </thead>
             <tbody>
              @if($pagos->count())  
              @foreach($pagos as $pago)  
              <tr>
                <td>{{$pago->id}}</td>
                <td>{{$pago->nombre}}</td>

                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('PagoController@show', $pago->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('PagoController@destroy', $pago->id)}}" method="post">
                   {{csrf_field()}}
                   <!-- <input name="_method" type="hidden" value="DELETE"> -->
                   @method('DELETE')
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL PAGO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>

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
        <li class="page-item">{{ $pagos->links() }}</a></li>
      
    </div>
    </div>
  </div>
</section>


@endsection