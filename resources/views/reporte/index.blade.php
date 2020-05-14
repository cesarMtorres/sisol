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
          <h3 class="panel-title">Reportes de Agremiados</h3>
        </div>
        <div class="panel-body">    
        <div class="panel-tittle">
          <div class=""><h3>Lista de Agremiados segun su fecha de inclusión en el sistema</h3></div>
          <div class="row">
           <form method="POST" action="{{ route('agremiado.imprimir') }}"  role="form">
              {{ csrf_field() }}
                    <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Rango de Fecha</label>
                          <div class="input-daterange input-group" >
                          <div class="form-groupm"></div>
                            <span class="input-group-addon">
                              Desde
                            </span>
                            
                            <input type="date" value="{{$mytime->format('Y-m-d')}}" id="fecha_ini" required="required" class="form-control" name="fecha_ini">
                            <span class="input-group-addon">Hasta</span>
                            <input type="date" value="{{$mytime->format('Y-m-d')}}" id="fecha_fin" class="form-control" name="fecha_fin" required="required">
                            </div>
                          
                        </div>
                    </div> 
                    <br>

           <button class="btn btn-danger" type="submit">Imprimir</button>
           
                 </div>    
         
             </div>      
             </form>
             <br>
             <br>
                <div class="panel-body">    
        <div class="panel-tittle">
          <div class=""><h3>Lista de Agremiados segun su fecha de Nacimiento</h3></div>
          <div class="row">
           <form method="POST" action="{{ route('agremiado.imprimirnac') }}"  role="form">
              {{ csrf_field() }}
                    <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Rango de Fecha</label>
                          <div class="input-daterange input-group" >
                          <div class="form-groupm"></div>
                            <span class="input-group-addon">
                              Desde
                            </span>
                            
                            <input type="date" value="{{$mytime->format('Y-m-d')}}" id="fecha_ini" required="required" class="form-control" name="fecha_ini" onblur="setFecha()">
                            <span class="input-group-addon">Hasta</span>
                            <input type="date" value="{{$mytime->format('Y-m-d')}}" id="fecha_fin" class="form-control" name="fecha_fin" required="required">
                            </div>
                          
                        </div>
                    </div> 
                    <br>

           <button class="btn btn-danger" type="submit">Imprimir</button>
           
                 </div>    
         
             </div>  
    </div>
  </section>
  @endsection
    @section('js')
  <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

  <script type="text/javascript">
    
function setFecha()

{

    var fecha= document.getElementById("fecha_ini").value;
    document.getElementById('fecha_fin').setAttribute("min", fecha);

    

    }


  </script>
  @endsection