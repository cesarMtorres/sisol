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
          <h3 class="panel-title">Banco</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('banco.update',$bancos->id) }}"  role="form">
              @csrf
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" readonly="readonly" value="{{$bancos->nombre}}">
                  </div>
                </div>
          </div>
                  </br>
                             <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('banco.index') }}" class="btn btn-info">Atras</a>
               <a href="{{ action('BancoController@edit',$bancos->id) }}" class="btn btn-success">Editar</a>
                  </div>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </section>
  @endsection