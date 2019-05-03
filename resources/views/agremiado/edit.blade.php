@extends('layouts.layout')
@section('content')
@section('title','AGREMIADO')
@section('panel_name','Agremiado')
@section('panel_rigth','Agremiado')
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
          <h3 class="panel-title">Actualizar Agremiado</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
                @foreach($agremiados as $agremiado)
                @foreach($agremiado->personas as $persona)
            <form  action="{{ route('agremiado.update',$agremiado->id) }}"  role="form">
             @csrf
              @method('PATCH')
              <div class="row">

                   <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloNumeros(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="8" required="required" value="{{$persona->cedula}}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{3,50}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required" value="{{$persona->nombre}}">
                  </div>
                </div>

                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control input-sm" pattern=".{0}|.{6,50}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required" value="{{$persona->apellido}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" pattern=".{0}|.{5,150}" title="Requiere minimo de (5 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="150" required="required" placeholder="">{{$persona->direccion}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <label>Fecha Nacimiento</label>
                <input type="text" id="fecha_nacimiento" required="required" value="{{ $persona->fecha_nacimiento }}" class="form-control input-sm" name="fecha_nacimiento"></div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Civ</label>
                    <input type="text" name="civ" id="civ" class="form-control input-sm" pattern=".{0}|.{3,6}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="return SoloNumeros(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="6" required="required" value="{{$agremiado->civ}}">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" id="codigo"  class="form-control input-sm" placeholder=""  value="{{ $agremiado->codigo }}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Solvencia</label>
                         <input type="date" name="solvencia" id="solvencia" class="form-control input-sm" placeholder="solvencia" onkeyup="javascript:this.value=this.value.toUpperCase();" required="required" value="{{ $agremiado->solvencia}}">
                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control input-sm" placeholder="correo" required="required" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $persona->correo }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" pattern=".{0}|.{6,50}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="6" required="required">{{$agremiado->trabajo}}</textarea>
              </div>
              <div class="row">
                    <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
                    <input type="submit" value="Actualizar" class="btn btn-success ">

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
