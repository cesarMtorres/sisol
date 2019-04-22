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
            <form method="POST" action="{{ route('tarifa.store') }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                    <label>Monto</label>
                    <input type="text" title="Campo: monto" name="monto" id="monto" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('monto') }}">
                  </div>


                          <label>Rango de Fecha</label>
                          <div class="input-daterange input-group" >
                            <span class="input-group-addon">
                              desde
                            </span>
                            <input type="date" value="{{ date('dd/mm/yy') }}" id="FechaInicio" class="form-control" name="fecha_ini">
                            <span class="input-group-addon">hasta</span>
                            <input type="date" id="FechaFin" class="form-control" name="fecha_fin">
                          
                        </div>
                      </div>

                </div>

          </div>
        </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
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
