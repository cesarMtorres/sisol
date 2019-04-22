@extends('layouts.layout')
@section('content')
@section('title','PAGO')
@section('panel_name','Pago')
@section('panel_rigth','Pago')
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
          <h3 class="panel-title">Nuevo Pago</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('pago.store') }}"  role="form">
              {{ csrf_field() }}
             
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Pago" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                </div>

          </div>
        </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('pago.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection