@extends('layouts.layout')
@section('content')
@section('panel_name','Proyecto')
@section('panel_rigth','Proyecto')
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
          <h3 class="panel-title">Nuevo Proyecto</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('proyecto.store') }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                  <div class="form-group">
                  <label>Tipo Proyecto</label>
                     <select class="form-control" data-placeholder="Seleccione" style="width: 70%;" name="tipo_proyecto_id" id="tipo_proyecto_id">
                      @if(count($tps))
                        @foreach ($tps as $tp)
                            <option value="{{ $tp->id }}">{{ $tp->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen registradas</option>
                      @endif
                    </select>
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <label>institcion</label>
                      <select class="form-control" data-placeholder="Seleccione" style="width: 70%;" name="instituto_id" id="instituto_id">
                      @if(count($ins))
                        @foreach ($ins as $in)
                            <option value="{{ $in->id }}">{{ $in->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen registradas</option>
                      @endif
                    </select>                   
                </div>

          </div>
        </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('proyecto.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection