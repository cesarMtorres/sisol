@extends('layouts.layout')
@section('title','USUARIO')
@section('panel_name','Usuario')
@section('panel_rigth','Usuario')
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
          <h3 class="panel-title">Nuevo Usuario</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('user.store') }}"  role="form">
              @csrf 
             
              <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre de Usuario</label>
                    <input type="text" name="name" id="name" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="50" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('name') }}">
                  </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Correo</label>
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="50"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('email')}}">
                  </div>
                </div>


                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Contraseña</label>
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloNumeros(event)" maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('password')}}">
                  </div>
                </div>  

                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Perfil</label>
                     <select class="form-control input-sm"  data-placeholder="seleccione" style="width: 70%;" name="roles" id="roles">
                      @if(count($roles))
                        @foreach($roles as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      @else
                        <option value="">No existen perfiles</option>
                      @endif
                    </select>
                </div>                     

                 <div class="col-xs-10 col-sm-10 col-md-8">
                  <label>Pregunta de Seguidad</label>
                     <select class="form-control input-sm"  data-placeholder="seleccione" style="width: 70%;" name="pregunta_seguridad" id="pregunta_seguridad">
                      
                            <option>¿Cual es el segundo nombre de su abuelo paterno?</option>
                            <option>¿Cual es el primer nombre de su abuela materna?</option>
                            <option>¿Cual fue el nombre de su primera mascota?</option>
                            <option>¿Donde nacio su madre?</option>
                            <option>¿Cual es la profesión de su padre?</option>
                            <option>¿Cual es el equipo de beisbol favorito de su padre?</option>
                            <option>¿Cual es el segundo nombre de su hermano mayor?</option>
                            <option>¿Cual es su marca de carro favorita?</option>
                            <option>¿Cual es su color favorito?</option>
                            <option>¿Donde paso su luna de miel?</option>

                    </select>
                </div>  

                </div>
                <div class="row">    

                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Respuesta de seguridad</label>
                  <div class="form-group">
                    <input type="password" name="respuesta_seguridad" id="respuesta_seguridad" class="form-control input-sm"  maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('respuesta_seguridad')}}">
                  </div>
                </div>                 


              </div>

          </div>
        </br>
        <div id="sms">
          
        </div>
      </br>
                   <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('user.index') }}" class="btn btn-info">Atras</a>
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