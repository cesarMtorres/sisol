@extends('layouts.layout')
@section('title','Usuario')
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
          <h3 class="panel-title">Actualizar Usuario</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('user.update',$users->id) }}"  role="form">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name" id="name" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="50" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$users->name}}">
                  </div>
                  </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Correo</label>
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-sm" title="Requiere minimo de (6 caracteres)"  maxlength="50"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $users->email}}">
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Contraseña</label>
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-sm" pattern=".{0}|.{6,8}" title="Requiere minimo de (6 caracteres)"  OnkeyPress="return SoloNumeros(event)" maxlength="8" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $users->password}}">
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
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
              


                </div>


          </div>

          </br>
          </br>      


        

        </br>
        <div id="sms"></div>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('user.index') }}" class="btn btn-info">Atras</a>
               <input type="submit" value="Actualizar" class="btn btn-success ">


          


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