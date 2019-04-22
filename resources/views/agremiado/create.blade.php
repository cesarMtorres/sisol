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
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Apellido</label>
                  <div class="form-group">
                    <input type="text" title="Campo: Apellido" name="apellido" id="apellido" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('apellido')}}">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>cedula</label>
                  <div class="form-group">
                    <input type="text" title="Campo: Cedula" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('cedula')}}">
                  </div>
                </div>                
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" title="Campo: Direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" >{{ old('direccion')}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" title="Campo: Civ" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="{{ old('civ')}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" title="Campo: Especialidad" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('especialidad')}}">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" title="Campo: Código" name="codigo" id="codigo" class="form-control input-sm"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('codigo') }}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Solvencia</label>
                         <input type="date" name="solvencia" id="solvencia" class="form-control input-sm" placeholder="solvencia" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('solvencia') }}">

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
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="{{ old('civ')}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('especialidad')}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" >{{ old('trabajo')}}</textarea>
              </div>
              <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection