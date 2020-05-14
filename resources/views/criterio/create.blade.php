@extends('layouts.layout')
@section('title','CRITERIO')
@section('panel_name','Criterio')
@section('panel_rigth','Criterio')
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
          <h3 class="panel-title">Nuevo Criterio</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('criterio.store') }}"  role="form">
              @csrf
             
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="140" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}" style="width: 250px">
                  </div>
                </div>


                 <div class="col-xs-4 col-sm-4 col-md-4">

                <div class="form-group">
                  <label>Tabla</label>


                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 100%;" name="tabla" id="tabla">
                     @if(count($tablas))
                        @foreach ($tablas as $uni)
                            <option value="{{ $uni->Tables_in_sisol  }}">{{ $uni->Tables_in_sisol  }}</option>
                        @endforeach
                      @else
                        <option value="">No existen tablas</option>
                      @endif

                     
                     
                    </select>
                    </div>
                </div>

          </div>

          <div class="row">

          <div class="col-xs-4 col-sm-4 col-md-4">

                <div class="form-group">
                  <label>Campo</label>


                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 100%;" name="campo" id="campo">

                     <option>Seleccione</option>
                     
                     
                    </select>
                    </div>
                </div>
         
          </div>
        </br>
        <div id="sms">
          
        </div>
      </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('criterio.index') }}" class="btn btn-info">Atras</a>
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
  <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

<script>
$(document).ready(function(){
    function loadCareer() {
        var faculty_id = $('#tabla').val();
        if ($.trim(faculty_id) != '') {
            $.get('careers', {faculty_id: faculty_id}, function (careers) {

                var old = $('#campo').data('old') != '' ? $('#campo').data('old') : '';

                $('#campo').empty();
                $('#campo').append("<option value=''>Selecciona una carrera</option>");

                $.each(careers, function (index, value) {
                    $('#campo').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                })
            });
        }
    }
    loadCareer();
    $('#tabla').on('change', loadCareer);
});
</script>





 @endsection
