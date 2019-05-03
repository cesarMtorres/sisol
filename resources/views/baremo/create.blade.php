@extends('layouts.layout')
@section('panel_name','Instrumento')
@section('title','INSTRUMENTO')
@section('panel_rigth','Instrumento')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection

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

      <!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
        <div class="modal-content"  align="left" >
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left">&times;</button>
                <table id="mytable" class="table table-bordred table-striped" >
             <thead>
             <form action="{{ route('baremoc.store') }}" class="navbar-form pull-right" method="POST" role="form">
              @csrf
                 <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Nombre Clasificación</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" pattern=".{0}|.{3,20}" title="Requiere minimo de (3 caracteres)"  maxlength="20" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                </div>
                

          </div> 
<button class="btn btn-primary" type="submit">Registrar</button >
          </form>     
               
             </thead>
 
          </table>
            </div>
            <div class="modal-footer">
              <div id="sms" class="text-center"></div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!----------------------- Termina Modal ----------------------------------------->


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo Instrumento (Baremos)</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('baremo.store') }}"  role="form">
              @csrf
             
              <div class="row">
                <div class="col-sm-4 col-xs-12 col-md-4">
                  <label>Clasificacion</label>
                  <div class="form-inline">
                    
                     <select class="form-control" required="required" data-placeholder="Seleccione" style="width: 70%;" name="clasificacion_id" id="clasificaciones">
                      @if(count($clasificaciones))
                        @foreach ($clasificaciones as $clasi)
                            <option value="{{ $clasi->id }}">{{ $clasi->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen clasificaciones registradas</option>
                      @endif
                    </select>
                   
                   <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">+</a>
                  </div>
                </div>
                 

                <div class="col-xs-12 col-sm-8 col-md-8">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" pattern=".{0}|.{3,20}" title="Requiere minimo de (3 caracteres)"  onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="20" required="required" value="{{ old('nombre') }}">
                  </div>
                </div>


          </div>
          <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="descripcion"  class="form-control" pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required" value="{{ old('nombre') }}"></textarea>
                  </div>
                </div>
          </div>
        </br>
        <div id="sms"></div>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('baremo.index') }}" class="btn btn-info">Atras</a>
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

<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
  @endsection