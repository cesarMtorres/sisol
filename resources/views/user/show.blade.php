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
          <h3 class="panel-title">Usuario</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('user.update',$users->id) }}"  role="form">
              @csrf
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre de Usuario</label>
                    <input type="text" name="name" id="name" class="form-control input-sm" readonly="readonly" value="{{$users->name}}">
                  </div>
                </div>

                 <div class="col-xs-6 col-sm-6 col-md-6">
                 <div class="form-group">
                  <label>Correo</label>
                  
                    <input type="email" name="email" id="email" class="form-control input-sm" readonly="readonly" value="{{ $users->email}}">
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <label>Contraseña</label>
                  
                    <input type="password" name="password" id="password" class="form-control input-sm" readonly="readonly" value="{{ $users->password}}">
                  </div>
                </div>  
 
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Perfil</label>
                     <select class="form-control input-sm" readonly="readonly" data-placeholder="" style="width: 70%;" name="perfil" id="description">
                      @if($users->roles->count())
                        @foreach ($users->roles as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                      @else
                        <option value="">No existen perfiles</option>
                      @endif
                    </select>
                </div>  

              </div>
          </div>

          


                  </br>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('user.index') }}" class="btn btn-info">Atras</a>
               <a href="{{ action('UsersController@edit',$users->id) }}" class="btn btn-success">Editar</a>

                  


                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection