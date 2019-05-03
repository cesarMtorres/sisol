@extends('layouts.layout')
@section('title','CONFIGURACION')
@section('panel_name','Configuracion')
@section('panel_rigth','Configuracion')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />

@endsection
@section('title','CONFIGURACIÓN')
@section('panel_name','Configuración')
@section('panel_rigth','Configuración')
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
          <h3 class="panel-title">Nueva Configuracion</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('configuracion.store') }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre de la Institución</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{3,50}" title="Requiere minimo de (3 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="15" required="required" value="{{ old('nombre') }}">
                  </div>
                </div>
                 <div class="col-xs-8 col-sm-8 col-md-8">
                         <div class="form-group">
                          <label class="control-label">Adjuntar Logo</label>
                        <div class="col-md-12">

                          <div class="fileupload fileupload-new" data-provides="fileupload">

                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Cambiar</span>
                                <span class="fileupload-new">Seleccionar Logo</span>

                                <input type="file" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

          </div>
        </br>
        <div id="sms"></div>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('configuracion.index') }}" class="btn btn-info">Atras</a>
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
<script src="{{ asset('assets/assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
<script src="{{ asset('assets/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>    
  @endsection