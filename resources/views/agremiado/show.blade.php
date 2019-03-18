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
          <h3 class="panel-title">Agremiado</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('agremiado.update',$agremiados->id) }}"  role="form">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$agremiados->nombre}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly="readonly" value="{{$agremiados->cedula}}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" readonly="readonly"  placeholder="Resumen">{{$agremiados->direccion}}</textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" class="form-control input-sm"readonly="readonly"  value="{{$agremiados->civ}}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" readonly="readonly" class="form-control input-sm" value="{{$agremiados->especialidad}}">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" id="codigo" readonly="readonly" class="form-control input-sm" placeholder="codigo del ing"  value="{{ $agremiados->codigo }}">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Solvencia</label>
                    <input type="date" name="solvencia" id="solvencia" readonly="readonly" class="form-control input-sm" placeholder="{{ $agremiados->solvencia }}">
                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" id="estado" readonly="readonly" class="form-control input-sm" placeholder="estado"  value="{{ $agremiados->estado }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" readonly="readonly" placeholder="Autor">{{$agremiados->trabajo}}</textarea>
              </div>
              <div class="row">
                    <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
                   <a href="{{ action('AgremiadoController@edit',$agremiados->id) }}" class="btn btn-success">Editar</a>

              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection