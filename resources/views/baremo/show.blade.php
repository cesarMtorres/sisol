@extends('layouts.layout')
@section('title','INSTRUMENTO')
@section('panel_name','Instrumento')
@section('panel_rigth','Instrumento')
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
          <h3 class="panel-title">Instrumento</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action=""  role="form">
              @csrf
              @method('PATCH')
              <div class="row">
                @foreach($instrumentos as $instrumento)
                @foreach($instrumento->instrumento_clasificiones as $clasi)
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$instrumento->nombre}}">
                  </div>
                </div>
                   <div class="col-sm-6 col-xs-12 col-md-6">
                  <label>Clasificacion</label>
                  <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$clasi->nombre}}">
                </div>
                <div class="row">
                   <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="descripcion" title="Campo: descripcion" readonly="readonly" class="form-control" pattern=".{0}|.{6,50}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required">{{$instrumento->descripcion}}</textarea>
                  </div>
                </div>
          </div>

                  </br>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('baremo.index') }}" class="btn btn-info">Atras</a>
               <a href="{{ action('InstrumentoController@edit',$instrumento->id) }}" class="btn btn-success">Editar</a>
                  </div>
                  </div>
                  @endforeach
                  @endforeach
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection