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
          <h3 class="panel-title">Funcion</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action=""  role="form">
              @csrf
              @method('PATCH')
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$funciones->nombre}}">
                  </div>
                </div>
                   <div class="col-sm-6 col-xs-12 col-md-6">
                  <label>Nivel</label>
                  @if($funciones->nivel==1)
                  <input type="text" name="nivel" id="nivel" class="form-control input-sm" readonly="readonly" value="PREDETERMINADO">
                  @else
                  <input type="text" name="nivel" id="nivel" class="form-control input-sm" readonly="readonly" value="ADMINISTRADOR">
                  @endif
                </div>
              </div>
                <div class="row">
                   <div class="col-sm-6 col-xs-12 col-md-6">
                  <label>Estado</label>
                  @if($funciones->status==1)
                  <input type="text" name="status" id="status" class="form-control input-sm" readonly="readonly" value="ACTIVO">
                  @else
                  <input type="text" name="status" id="status" class="form-control input-sm" readonly="readonly" value="DESACTIVADO">
                  @endif
                </div>
                 </div>

                  </br>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('funcion.index') }}" class="btn btn-info">Atras</a>
               <a href="{{ action('FuncionController@edit',$funciones->id) }}" class="btn btn-success">Editar</a>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection