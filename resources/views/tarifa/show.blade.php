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
          <h3 class="panel-title">Tarifa</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('tarifa.update',$tarifas->id) }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre"  readonly="readonly" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $tarifas->nombre }}">
                   </div>
                 </div>
                    <div class="col-sm-6 col-md-6 col-xs-6">
                    <label>Monto</label>
                    <input type="text" title="Campo: monto" name="monto" id="monto"  readonly="readonly" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $tarifas->monto }}">
                  </div>
                </div>

                  <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Rango de Fecha</label>
                          <div class="input-daterange input-group" data-plugin-datepicker>
                            <span class="input-group-addon">
                              desde
                            </span>
                            <input type="text" id="FechaInicio" disabled="disabled" value="{{ $tarifas->fecha_ini }}" class="form-control" name="fecha_ini">
                            <span class="input-group-addon">hasta</span>
                            <input type="text" id="FechaFin"  disabled="disabled" value="{{ $tarifas->fecha_fin }}" class="form-control" name="fecha_fin">
                          
                        </div>
                      </div>

                </div>
        </br>
        <div id="sms"></div>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('tarifa.index') }}" class="btn btn-info">Atras</a>
              <a href="{{ action('TarifaController@edit',$tarifas->id) }}" class="btn btn-success">Editar</a>
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
