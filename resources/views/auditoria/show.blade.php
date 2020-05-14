@extends('layouts.layout')
@section('content') 
@section('css')
<link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />


@endsection
                <section class="panel">

                  <header class="panel-heading">



                   <div class="panel-actions">


                      
                    </div>

                    <h2 class="panel-title">Auditoria</h2>
                  </header>

                  <div class="panel-body">
                  
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


        <div class="panel-body">         
        


          <div class="table-container">
            <form method="POST" action="{{ route('auditoria.store') }}"  role="form" enctype="multipart/form-data">
              @csrf

              <div class="table-container">
           

              
              <input name="_method" type="hidden" value="POST">
              
                @foreach($agremiados as $agremiado)
                @foreach($agremiado->personas as $persona)

                 <input type="hidden" name="personaid" value="{{$persona->id}}">
                  <input type="hidden" name="agremiado_id" id="agremiado_id" value="{{$agremiado->id}}">
                  <input type="hidden" name="status" id="status" value="AUDITANDO">


                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <label>Responsable</label>
                  <div class="form-inline">
                    <input type="text" name="" id="" readonly="readonly" class="form-control input-sm" placeholder="Nombre del Ing"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$persona->nombre}}">
                    
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Cédula</label>
                         <input type="text" name="solvencia" readonly="readonly" id="solvencia" class="form-control input-sm" placeholder="Cédula" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$persona->cedula}}">
                         <input type="hidden" name="correo" readonly="readonly" id="correo" value="{{$persona->correo}}">

                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>CIV</label>
                    <input type="text" name="" id="" readonly="readonly" class="form-control input-sm" placeholder="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$agremiado->civ}}">
                  </div>
                </div>
              </div>

              @endforeach
              @endforeach
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Nombre del Proyecto</label>
                    <input type="text" name="nombre" id="nombre" pattern=".{0}|.{10,150}" title="Requiere minimo de (10 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="150" required="required" class="form-control input-sm" value="{{ old('nombre')}}">
                  </div>
                </div>
              </div>

               <div class="row">

              <div class="col-xs-4 col-sm-4 col-md-4">

                <div class="form-group">
                  <label>Motivo</label>
                     <select class="form-control input-sm" required="required" data-placeholder="Seleccione" style="width: 70%;" name="motivo_id" id="motivo_id">
                      @if(count($motivo))
                        @foreach ($motivo as $moti)
                            <option value="{{ $moti->id }}">{{ $moti->nombre }}</option>
                        @endforeach
                      @else
                        <option value="">No existen Motivos</option>
                      @endif
                    </select>
                    </div>
                </div>
             </div>
             
                        <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                          <label class="control-label">Adjuntar Plano</label>
                        

                          <div class="fileupload fileupload-new" data-provides="fileupload">

                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Cambiar</span>
                                <span class="fileupload-new">Seleccionar Plano</span>

                                <input name="filenames" id ="filenames" type="file" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>

              <div class="form-group">
                <label>Observación</label>
                <textarea name="observacion" id="observacion" class="form-control input-sm" pattern=".{0}|.{15,150}" title="Requiere minimo de (15 caracteres)"  OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="150" required="required" placeholder="Observación">{{ old('observacion')}}</textarea>
              </div>
          

          </div>

        </div>

      </div>
    </div>
  

                  </div>
                                               <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('auditoria.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary"  type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
                </section>
@endsection

@section('js')
    <script src="{{ asset('assets/assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
@endsection