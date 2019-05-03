@extends('layouts.layout')
@section('title','CEPIR')
@section('content')
@section('panel_name','Cepir')
@section('panel_rigth','Cepir')

                <section class="panel">

                  <header class="panel-heading">
                              <div class="col-md-6 form-inline">
            <label>Buscar Nombre</label>
                  <a href="#Modal" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">+</a>

<!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
        <div class="modal-content"  align="left" >
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left">&times;</button>
                <table id="mytable" class="table table-bordred table-striped" >
             <thead>
             <form action="" class="navbar-form pull-right" method="get">
            <div class="input-group">
            <tr>
              <td>
            <input type="text" class="form-control" name="nombre" pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required">
              </td>            
              <td>
               <button type="submit" class="search"> <span class="input-group-addon" id="search" ><span class="fa fa-search" arial-hidden="true" id="search"> </span></span></button>
             </td></tr>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left"></button>           
            </div> 
          </form> 
          <thead>
          <th>Seleccionar</th>
                <th>Civ</th>
               <th>Nombre</th>
               <th>Apellido</th>
             </thead>
             <tbody>
              @if($agremiados->count())  
              @foreach($agremiados as $agremiado)
              @foreach($agremiado->personas as $persona)
              <tr>
                <td><input id="radio" type="radio" name="civ" value="{{ $agremiado->civ }}"></td>
                <td>{{$agremiado->civ}}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>      
                 
               </tr>
               @endforeach 
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal">Buscar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!----------------------- Termina Modal ----------------------------------------->

                  <div id="modalBasic" class="modal-block mfp-hide">
                    <section class="panel">
                      <header class="panel-heading">
                        <h2 class="panel-title">Catalogo</h2>
                      </header>
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
</div>  
                    <div class="panel-actions">

                      <a href="#" class="fa fa-caret-down"></a>
                    </div>

                    <h2 class="panel-title">Agremiado Certificante</h2>
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
            <form method="POST" action=""  role="form">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Resumen"></textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="codigo del ing"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Solvencia</label>
                         <input type="date" name="solvencia" id="solvencia" class="form-control input-sm" placeholder="solvencia" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">

                  </div>
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control input-sm" placeholder="estado" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Autor"></textarea>
              </div>
          

            </form>
          </div>
        </div>

      </div>
    </div>
                    </form>
                  </div>
                </section>


                <section class="panel">

                  <header class="panel-heading">
                                                  <div class="col-md-6 form-inline">
            <label>Buscar Nombre</label>
     <a href="#Modal2" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">+</a>

<!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal2" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
        <div class="modal-content"  align="left" >
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left">&times;</button>
                <table id="mytable" class="table table-bordred table-striped" >
             <thead>
             <form action="" class="navbar-form pull-right" method="get">
            <div class="input-group">
            <tr>
              <td>
            <input type="text" class="form-control" name="nombre" pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required">
              </td>            
              <td>
               <button type="submit" class="search"> <span class="input-group-addon" id="search" ><span class="fa fa-search" arial-hidden="true" id="search"> </span></span></button>
             </td></tr>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left"></button>           
            </div> 
          </form> 
          <thead>
          <th>Seleccionar</th>
                <th>Civ</th>
               <th>Nombre</th>
               <th>Apellido</th>
             </thead>
             <tbody>
              @if($agremiados->count())  
              @foreach($agremiados as $agremiado)
              @foreach($agremiado->personas as $persona)
              <tr>
                <td><input id="radio" type="radio" name="civ" value="{{ $agremiado->civ }}"></td>
                <td>{{$agremiado->civ}}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>      
                 
               </tr>
               @endforeach 
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal">Buscar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!----------------------- Termina Modal ----------------------------------------->
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
        <div class="row">

</div> 
          <div class="table-container">
            <form method="POST" action=""  role="form">
              {{ csrf_field() }}
              <input name="_method" type="hidden" value="PATCH">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <label>cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Resumen"></textarea>
              </div>
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>civ</label>
                    <input type="text" name="civ" id="civ" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control input-sm" value="">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>N° Contrato</label>
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm"   onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <label>Institucion</label>
                      <div class="form-inline">
                    
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" readonly="readonly" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                     <a href="#Modal3" role="button" class="btn btn-large btn-primary" data-toggle="modal" aling="left">+</a>
                  </div>
                </div>
                                  <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Monto</label>
                    <input type="text" name="estado" id="estado" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                      </div>
                                       <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                  <div class="form-group">
                    <label> Nombre del Proyecto</label>
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm"   onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>


                      </div>
                </div>
              <div class="form-group">
                <label>Trabajo</label>
                <textarea name="trabajo" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
              </div>

            </form>
          </div>
        </div>

      </div>
      <div class="row">
  <div class="col-md-6 col-sm-6">
    <button class="btn btn-info">Atras</button>
  </div>
  <div class="col-md-6 col-sm-6">
    <button  id="click-to-close-success"  class="btn btn-success"><span class="fa fa-print"></span> Imprimir</button>
  </div>
</div>
    </div>

                  </div>

                </section>

    

<!--------------------------- Modal ------------------------------------------->
          <!-- Botón en HTML (lanza el modal en Bootstrap) -->
<!-- Modal / Ventana / Overlay en HTML -->
<div id="Modal3" class="modal fade" align="left">
    <div class="modal-dialog" align="left" >
        <div class="modal-content"  align="left" >
            <div class="modal-header" align="left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left">&times;</button>
                <table id="mytable" class="table table-bordred table-striped" >
             <thead>
             <form action="" class="navbar-form pull-right" method="get">
            <div class="input-group">
            <tr>
              <td>
            <input type="text" class="form-control" name="nombre" pattern=".{0}|.{4,50}" title="Requiere minimo de (4 caracteres)" OnkeyPress="return SoloLetras(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required="required">
              </td>            
              <td>
               <button type="submit" class="search"> <span class="input-group-addon" id="search" ><span class="fa fa-search" arial-hidden="true" id="search"> </span></span></button>
             </td></tr>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" align="left"></button>           
            </div> 
          </form> 
          <thead>
            <th>Selecionar</th>
               <th>Nombre</th>
             </thead>
             <tbody>
              @if($institutos->count())  
              @foreach($institutos as $instituto)
              <tr>
                <td><input id="radio" type="radio" name="id" value="{{ $instituto->id }}"></td>
                <td>{{ $instituto->nombre }}</td>           
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" data-dismiss="modal">Buscar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!----------------------- Termina Modal ----------------------------------------->

</div>  

  @endsection

  @section('js')
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>
  @endsection