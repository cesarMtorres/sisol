@extends('layouts.layout')
@section('panel_name','Funcion')
@section('title','FUNCION')
@section('panel_rigth','Funcion')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

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
          <h3 class="panel-title">Nuevo Funcion</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
              <form method="POST" action="{{ route('funcion.store') }}"  role="form">
              @csrf
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{3,50}" title="Requiere minimo de (3 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required" value="{{ old('funciones->nombre') }}">
                  </div>
                </div>
                   <div class="col-sm-6 col-xs-12 col-md-6">
                          <div class="form-group">
                            <div class="col-sm-4">
                              <label>Nivel</label>
                              <select class="form-control" name="nivel" required="required" style="width: 150%">
                                <option value="1">PREDETERMINADO</option>
                                <option value="2">ADMINISTRADOR</option>
                              </select>
                            </div>
                          </div>
                </div>
              </div>
                <div class="row">
                   <div class="col-sm-6 col-xs-12 col-md-6">
                          <div class="form-group">
                            <div class="col-sm-4">
                             <label> Estado</label>
                              <select class="form-control" name="status"  required="required" style="width: 120%">
                                <option value="1">ACTIVADO</option>
                                <option value="0">DESACTIVAR</option>
                              </select>
                            </div>
                          </div>
                </div>
                 </div>

                  </br>
                  <div id="sms"></div>
                  <div class="row">
                  <div class="col-sm-4 col-md-6">
                  <a href="{{ route('funcion.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection
  @section('js')

<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
  @endsection