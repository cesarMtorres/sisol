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

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo Instrumento (Baremos)</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('baremo.store') }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-sm-4 col-xs-12 col-md-4">
                  <label>Clasificacion</label>
                  <div class="form-inline">
                    
                     <select class="form-control" data-placeholder="Seleccione" style="width: 70%;" name="clasificaciones" id="clasificaciones">
                      @if(count($clasificaciones))
                        @foreach ($clasificaciones as $clasi)
                            <option value="{{ $clasi->id }}">{{ $clasi->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen clasificaciones registradas</option>
                      @endif
                    </select>
                   
                   <a href="#" class="btn btn-primary">+</a>
                  </div>
                </div>
                 

                <div class="col-xs-12 col-sm-8 col-md-8">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                </div>


          </div>
          <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="descripcion" title="Campo: descripcion" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}"></textarea>
                  </div>
                </div>
          </div>
        </br>
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
  @endsection