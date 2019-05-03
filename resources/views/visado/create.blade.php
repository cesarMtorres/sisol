@extends('layouts.layout')
@section('title','VISADO')
@section('content')
@section('panel_name','Visado')
@section('panel_rigth','Visado')

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

                    <h2 class="panel-title">Visado</h2>
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
                 <div class="col-xs-4col-sm-4 col-md-4">
                  <label>Civ</label>
                  <div class="form-group">
                    <input type="text" name="civ" id="civ" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
                <div class="col-xs-4col-sm-4 col-md-4">
                  <label>cedula</label>
                  <div class="form-group">
                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder=""></textarea>
              </div>
          <!-- start: page -->
          <div class="row">
          <h2 class="pb-lg text-center">Instrumento (Baremos)</h2>
            <div class="col-md-12">
              <div class="panel-group" id="accordionPrimary">
                <div class="panel panel-accordion panel-accordion-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionPrimary" href="#collapsePrimaryOne">
                        ARQUITECTURA
                      </a>
                    </h4>
                  </div>
                  <div id="collapsePrimaryOne" class="accordion-body collapse">
                              <ul class="widget-todo-list">
                                <li>
                                  <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox"  id="todoListItem1" class="todo-check">
                                    <label class="todo-label" for="todoListItem1"><span><strong>A32 | PARED DE LADRILLO</strong></span></label>
                                  </div>
  
                                </li>
                                <li>
                                  <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" id="todoListItem2" class="todo-check">
                                    <label class="todo-label" for="todoListItem2"><span><strong>A33 | PARED DE BLOQUE GRIS </strong></span></label>
                                  </div>

                                </li>
                                <li>
                                  <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" id="todoListItem3" class="todo-check">
                                    <label class="todo-label" for="todoListItem3"><strong>A41 | COLUMNAS PRIMAS</strong></span></label>
                                  </div>

                                </li>
                              </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="panel-group" id="accordionPrimary">
                <div class="panel panel-accordion panel-accordion-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionPrimary" href="#collapsePrimaryTwo">
                        ELECTRICIDAD
                      </a>
                    </h4>
                  </div>
                  <div id="collapsePrimaryTwo" class="accordion-body collapse">
                              <ul class="widget-todo-list">
                                <li>
                                  <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox"  id="todoListItem1" class="todo-check">
                                    <label class="todo-label" for="todoListItem1"><span><strong>E32 | TOMA CORRIENTE TRIFASICA</strong></span></label>
                                  </div>
  
                                </li>
                                <li>
                                  <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" id="todoListItem2" class="todo-check">
                                    <label class="todo-label" for="todoListItem2"><span><strong>E33 | BREQUERA </strong></span></label>
                                  </div>

                                </li>

                              </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
                        <div class="form-group">
                <label>Observacion</label>
                <textarea name="observacion" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder=""></textarea>
              </div>
          <!-- end: page -->
        </section>
        <div class="row">
          <button class="btn btn-default" type="submit">Atras</button>
          <button class="btn btn-success" type="submit">Registrar</button>
        </div>

                </div>

              </div>



          </div>
        </div>

      </div>
    </div>
                    </form>
                  </div>
                </section>


  @endsection

  @section('js')
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.notifications.js') }}"></script>
  <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.nestable.js') }}"></script>
  @endsection