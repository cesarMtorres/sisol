@extends('layouts.layout')
@section('content')



  <section class="content">
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
 
<div class="container">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo Agremiado</h3><br/>
        </div>
<form method="POST" action="{{ route('agremiado.store') }}" role="form" class="needs-validation" novalidate>
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">Nombre y apellido</label>
      <input type="text" name="nombre" class="form-control" id="validationServer01" placeholder="" value="{{ old('nombre') }}" required="">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServerUsername">Cedula</label>
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control " name="cedula" id="validationServerUsername" placeholder="" aria-describedby="inputGroupPrepend3"  value="{{ old('cedula') }}" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">Direccion</label>
      <input type="text" class="form-control " name="direccion" id="validationServer03" placeholder=""  value="{{ old('direccion') }}" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">civ</label>
      <input type="text" class="form-control " id="validationServer04" name="civ"  placeholder=""  value="{{ old('civ') }}" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>  
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Codigo</label>
      <input type="text" class="form-control " id="validationServer05" name="codigo" placeholder=""  value="{{ old('codigo') }}" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">Solvencia</label>
      <input type="text" class="form-control " id="validationServer01" name="solvencia" placeholder="" value="{{ old('nombre') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer02">Trabajo</label>
      <input type="text" class="form-control input-sm " id="validationServer02" name="trabajo" placeholder="" value="{{ old('trabajo') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
    <a href="{{ route('agremiado.index') }}" class="btn btn-info">Atras</a>
  <button class="btn btn-primary" type="submit">Submit form</button>

</form>

</div>
</div>
  </section>
  @endsection