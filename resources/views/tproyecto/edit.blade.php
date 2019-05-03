@extends('layouts.layout')
@section('panel_name','Motivo')
@section('panel_rigth','Motivo')
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
          <h3 class="panel-title">Actualizar Motivo</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('tproyecto.update',$tproyectos->id) }}"  role="form">
              {{ csrf_field() }}
          <!--    <input name="_method" type="hidden" value="PATCH"> -->
              @method('PATCH')
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{5,50}" title="Requiere minimo de (5 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required" value="{{$tproyectos->nombre}}">
                  </div>
                </div>
          </div>
        </br>
        <div id="sms"></div>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('tproyecto.index') }}" class="btn btn-info">Atras</a>
               <input type="submit" value="Actualizar" class="btn btn-success ">
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection
    @section('js')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
  @endsection