 @extends('layouts.layout')

@section('content')
@section('title','USUARIO')
@section('panel_name','Usuario')
@section('panel_rigth','Usuario')
<div class="row">
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
      @endif  
  <section class="content">
    <div class="col-md-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel-heading">
          <div class="panel-tittle">
          <div class=""><h3>Lista Usuarios</h3></div>
           <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Imprimir</a>
             </div>

        </div>

        </div>
          <div class="pull-right">
            <div class="btn-group">
              <a class="btn btn-primary" href="#">Buscar</a>
              <a title="Nuevo Registro" href="{{ route('usuario.create') }}" class="btn btn-success" >Agregar</a> 
            </div>

          </div>

        
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
              <th>N°</th>
              <th>Civ</th>
               <th>Cedula</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Teléfono</th>
             </thead>
             <tbody>
              @if($users->count())  
              @foreach($users as $key => $user)
             
              <tr>
                <td>{{$key+1 }}</td>
                <td>{{$user->name }}</td>
                <td>{{$user->email}}</td>
               
                
                <td><a title="Ver" class="btn btn-xs btn-info" href="{{action('UsersController@show', $users->id)}}" ><span class="icon icon-eye"></span>Ver</a></td>
               <td>
                  <form action="{{action('UsersController@destroy', $users->id)}}" method="post">
                   @csrf
                   <input name="_method" type="hidden" value="DELETE">
                   <button onclick="return confirm('ESTÁS SEGURO QUE DESEAS ELIMINAR EL AGREMIADO?');" class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash">Eliminar</span></button>
                   </form>
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
      <div class="pagination pull-right">
        <li class="page-item"></a></li>
      </div>
    </div>
  </div>
</section>


@endsection