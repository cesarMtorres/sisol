@extends('layouts.layout')
@section('title','BANCO')
@section('panel_name','Banco')
@section('panel_rigth','Banco')
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
          <h3 class="panel-title">Nuevo Banco</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('banco.store') }}"  role="form">
              @csrf
             
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="140" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}" style="width: 350px">
                  </div>
                </div>

          </div>
        </br>
        <div id="sms">
          
        </div>
      </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('banco.index') }}" class="btn btn-info">Atras</a>
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
  @endsection