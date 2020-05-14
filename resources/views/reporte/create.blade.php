@extends('layouts.layout')
@section('title','Reporte')
@section('panel_name','Reporte')
@section('panel_rigth','Reporte')
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
          <h3 class="panel-title">Reportes de Auditorias y Visados </h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action=""  role="form">
              @csrf
             
              <div class="row">
                <div >
                  <div class="form-group">
                    <h3>Reporte de auditorias por agremiado</h3><p>En este apartado, usted podra ver un reporte  de auditorias que fueron aprobadas o rechazadas a cada ingeniero.</p>

                    
                   

                    <h3>Reporte de visados por zona</h3><p>En este apartado, usted podra ver una grafica los visados de planos que por zona especifica(api de googlemaps).</p>

                     
                  




                    
                  </div>
                </div>

          </div>
        </br>
        <div id="sms">
          
        </div>
      </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="" class="btn btn-info">Atras</a>
                 
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