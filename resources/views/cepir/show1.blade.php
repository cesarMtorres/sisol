@extends('layouts.layout')
@section('title','CEPIR')
@section('content')
@section('panel_name','Cepir')
@section('panel_rigth','Cepir')

                <section class="panel">

                  <header class="panel-heading">
                  
            
 


                  <div id="modalBasic" class="modal-block mfp-hide">
                    <section class="panel">
                      
                      <div class="panel-body">
                        <div class="modal-wrapper">
                          <div class="modal-text"> 
                            <p>tabla</p>
                          </div>
                        </div>
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button class="btn btn-primary modal-confirm">Aceptar</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                          </div>
                        </div>
                      </footer>
                    </section>
                  </div>
 
                    <div class="panel-actions">

                      <a href="#" class="fa fa-caret-down"></a>
                    </div>

                    <h2 class="panel-title">Agremiado a Certificar</h2>
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
            <form method="POST" action="{{ route('cepir.store') }}"  role="form">
              @csrf

              
              <input name="_method" type="hidden" value="POST">
              
                 @foreach($persona as $personaita)
         @foreach($personaita->personas as $per)

               

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly" value="{{$per->nombre}}">
                  </div>
                </div>
                    
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Cédula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly" value="{{$per->cedula}}">
                  </div>
                </div>
              </div>
              <br>


             
             

              <div class="form-group">
                <label>Dirección</label>
                <textarea name="direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Resumen" readonly="readonly">{{$per->direccion}}</textarea>
              </div>

              @endforeach
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" readonly="readonly" value="{{$agremiados->civ}}">
                  </div>
                </div>

                 
                   @foreach($personaita->especialidades as $espe)
                           
                       
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="readonly"  value="{{$espe->nombre}}">
                  </div>
                </div>
              

              @endforeach
              @endforeach


             
              
                      
                      
                 
                
                </div>
                
                 
             
              
            
              <br>

              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label for="">Nombre del Proyecto</label>
                  <input type="text" value="{{ $cepir->nombre_proyecto }}" readonly="readonly" class="form-control">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <label for="">N de Contrato</label>
                  <input type="text" value="{{ $cepir->ncontrato }}" readonly="readonly" class="form-control">
                </div>
              </div>  
              <div class="row">
               <div class="col-xs-6 col-sm-6 col-md-6">

                
                  <label>Empresa</label>
                     
                        
                            <input type="text" value="{{ $empresa->nombre }}" readonly="readonly" class="form-control"> 
                       
                     
                    
                </div>

                 <div class="col-xs-6 col-sm-6 col-md-6">

                
                  <label>Instituto</label>
                     <input type="text" value="{{ $instituto->nombre }}" readonly="readonly" class="form-control">  
                </div>
                </div>

               <br>


                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>Monto</label>
                  <div class="form-group">
                    <input type="text" id="monto_num" required="required" name="monto_num" value="{{ $cepir->monto_letras }}" readonly="readonly" class="form-control input-sm" >
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Monto en letras</label>
                    <input type="text" name="monto_letras" id="monto_letras" readonly="readonly" value="{{ $cepir->monto_num }}" class="form-control input-sm" >
                  </div>

                </div>
                
                    
              </div>
              <br>

              <div id="sms"></div>
              <a href="{{ route('cepir.index') }}" class="btn btn-info">Atras</a>


            </form>
          </div>
        </div>

      </div>
    </div>
                    </form>
                  </div>
                </section>


@endsection
@section('js')
<script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
@endsection
