@extends('layouts.layout')
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
          <h3 class="panel-title">Nuevo Agremiado</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('agremiado.store') }}"  role="form">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text"  name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{3,50}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="15" required="required" value="{{ old('nombre') }}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Apellido</label>
                  <div class="form-group">
                    <input type="text" name="apellido" id="apellido" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="50" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('apellido')}}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloNumeros(event)" maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('cedula')}}">
                  </div>
                </div>                
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" title="Requiere minimo de (6 caracteres)" pattern=".{0}|.{6,150}" title="Requiere minimo de (6 caracteres)"  maxlength="150" onkeyup="javascript:this.value=this.value.toUpperCase();" >{{ old('direccion')}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" pattern=".{0}|.{3,6}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloNumeros(event)" maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="{{ old('civ')}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Especialidad</label>
                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 70%;" name="especialidades" id="clasificaciones">
                      @if(count($especialidades))
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen especialidad</option>
                      @endif
                    </select>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" required="required" id="fecha" class="form-control input-sm" onblur="calc()" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('fecha_nacimiento') }}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Solvencia</label>
                         <input type="date" name="solvencia" id="solvencia" class="form-control input-sm" placeholder="solvencia" onkeyup="javascript:this.value=this.value.toUpperCase();" required="required" value="{{ old('solvencia') }}">

                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="estado" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{  old('estado') }}">
                  </div>
                </div>
              </div>
                            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" id="civ" pattern=".{0}|.{11,11}" title="Requiere (11 caracteres)"  OnkeyPress="return SoloNumeros(event)" maxlength="8" class="form-control input-sm" value="{{ old('civ')}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="text" name="correo" required="required" id="correo" class="form-control input-sm" title="Requiere Email"  OnkeyPress="return validateMail(event)"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('correo')}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" pattern=".{0}|.{6,50}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloLetras(event)" maxlength="50" onkeyup="javascript:this.value=this.value.toUpperCase();" >{{ old('trabajo')}}</textarea>
              </div>
             <br>
             <div id="sms"></div>
              <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection
  @section('js')
  <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
  @endsection