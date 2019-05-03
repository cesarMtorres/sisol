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
          <h3 class="panel-title">Nueva Tarifa</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('tarifa.store') }}"  role="form" >
              @csrf
             
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{4,30}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="30" required="required" value="{{ old('nombre') }}">
                  </div>
                </div>
                  <div class="col-sm-6 col-md-6 col-xs-6">
                    <label>Monto</label>
                    <input type="text" name="monto" id="monto" class="form-control input-sm" pattern=".{0}|.{2,10}" title="Requiere monto" OnkeyPress="return SoloNumeros(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="10" required="required" value="{{ old('monto') }}">
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Rango de Fecha</label>
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              desde
                            </span>
                            <input type="date" max="{{ date('d/m/Y') }}" value="{{ date('d/m/Y') }}" id="FechaInicio" required="required" class="form-control" name="fecha_ini">
                            <span class="input-group-addon">hasta</span>
                            <input type="date" max="{{ date('d/m/Y') }}" value="{{ date('d/m/Y') }}" id="FechaFin" class="form-control" name="fecha_fin" required="required">
                          
                        </div>
                    </div>
                  </div>

        </br>
        <div id="sms"></div>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('tarifa.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection

<script type="text/javascript">
      $('#FechaInicio').datepicker({
      format:'yyyy-mm-dd',
      autoclose: true
    });

    $('#FechaFin').datepicker({
      format:'yyyy-mm-dd',
      autoclose: true
    });
</script>

    @section('js')
  <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
  @endsection
