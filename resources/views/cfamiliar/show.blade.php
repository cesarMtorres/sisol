@extends('layouts.layout')
@section('title','CARGA FAMILIAR')
@section('panel_name','Carga Familiar')
@section('panel_rigth','Carga Familiar')
@section('content')
  <section class="content">
    <div class="col">
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
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Agremiado</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action=""  role="form">
             @csrf
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                @foreach($agremiados as $agremiado)
                @foreach($agremiado->personas as $persona)

                   <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly="readonly" value="{{$persona->cedula}}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$persona->nombre}}">
                  </div>
                </div>

                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control input-sm" readonly="readonly" value="{{$persona->apellido}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" readonly="readonly"  placeholder="Resumen">{{$persona->direccion}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <label>Fecha Nacimiento</label>
                <input type="text" id="fecha_nacimiento" disabled="disabled" value="{{ $persona->fecha_nacimiento }}" class="form-control input-sm" name="fecha_nacimiento"></div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Civ</label>
                    <input type="text" name="civ" id="civ" class="form-control input-sm"readonly="readonly"  value="{{$agremiado->civ}}">
                  </div>
                </div>
         <!--       <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" readonly="readonly" class="form-control input-sm" value="">
                  </div> 
                </div>  -->
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" id="codigo" readonly="readonly" class="form-control input-sm" placeholder="codigo del ing"  value="{{ $agremiado->codigo }}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                <div class="input-group">
                <label>Solvencia</label>
                <input type="text" id="solvencia" disabled="disabled" value="{{ $agremiado->solvencia }}" class="form-control input-sm" name="solvencia"></div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" readonly="readonly" class="form-control input-sm" placeholder="correo"  value="{{ $persona->correo }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" readonly="readonly" placeholder="Autor">{{$agremiado->trabajo}}</textarea>
              </div>
              <div class="row">
                    <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
                   <a href="{{ action('AgremiadoController@edit',$agremiado->id) }}" class="btn btn-success">Editar</a>

              </div>
              @endforeach
              @endforeach
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection

  <script type="text/javascript">
      $('#solvencia').datepicker({
      format:'yyyy-mm-dd',
      autoclose: true
    });
</script>
