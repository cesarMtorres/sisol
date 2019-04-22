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
        <div class="row">

</div> 
          <div class="table-container">
            <form method="POST" action="{{ route('auditoria.store') }}"  role="form">
              {{ csrf_field() }}
              <!--<input name="_method" type="hidden" value="PATCH"> -->
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <label>Responsable</label>
                  <div class="form-inline">
                    <input type="text" name="codigo" id="codigo" readonly="readonly" class="form-control input-sm" placeholder="nombre del ing"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                    <a  href="#tabla" class="btn btn-info">Catalogo</a>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>cedula</label>
                         <input type="text" name="solvencia" readonly="readonly" id="solvencia" class="form-control input-sm" placeholder="cedula" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">

                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="estado" id="estado" readonly="readonly" class="form-control input-sm" placeholder="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>nombre del Proyecto</label>
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="">
                  </div>
                </div>
              </div>
             
                        
                         <div class="form-group">
                          <label class="control-label">Adjuntar Plano</label>
                        <div class="col-md-12">

                          <div class="fileupload fileupload-new" data-provides="fileupload">

                            <div class="input-append">
                              <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                              </div>
                              <span class="btn btn-default btn-file">
                                <span class="fileupload-exists">Cambiar</span>
                                <span class="fileupload-new">Seleccionar Plano</span>

                                <input type="file" />
                              </span>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                            </div>
                          </div>
                        </div>
                      </div>

              <div class="form-group">
                <label>observacion</label>
                <textarea name="trabajo" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="observacion"></textarea>
              </div>
          

          </div>

        </div>

      </div>
    </div>

                  </div>
                                               <div class="row">
                  <div class="col-sm-4 col-md-6">
              <a href="{{ route('auditoria.index') }}" class="btn btn-info">Atras</a>
                  <button class="btn btn-primary" type="submit">Registrar</button>
                  </div>
                  </div>
            </form>
                </section>
@endsection

@section('js')
    <script src="{{ asset('assets/assets/vendor/jquery-autosize/jquery.autosize.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
@endsection