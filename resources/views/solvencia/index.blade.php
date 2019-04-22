@extends('layouts.layout')
@section('title','SOLVENCIA | ADMINISTRATIVA')
@section('panel_name','Solvencia')
@section('panel_rigth','Solvencia')
@section('content')		
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>

										</div>
						
										<h2 class="panel-title">Solvencia Administrativa</h2>
									</header>
									<div class="panel-body">
										<div class="wizard-progress wizard-progress-lg">
											<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
											<ul class="wizard-steps">
												<li class="active">
													<a href="#w4-account" data-toggle="tab"><span>1</span>Agremiado</a>
												</li>
												<li>
													<a href="#w4-profile" data-toggle="tab"><span>2</span>Fechas</a>
												</li>
												<li>
													<a href="#w4-billing" data-toggle="tab"><span>3</span>Confirmar Pago</a>
												</li>
												<li>
													<a href="#w4-confirm" data-toggle="tab"><span>4</span>infromacion</a>
												</li>
											</ul>
										</div>
						
										<form class="form-horizontal" novalidate="novalidate">
											<div class="tab-content">
												<div id="w4-account" class="tab-pane active">
													<div class="form-group">

<div class="col-md-8 col-sm-8">
                  <label>Nombre Agremiado</label>
                      <div class="form-inline">
                    
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" readonly="readonly"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                    <a class=" modal-basic btn btn-info" href="#catalogoAgremiado">Catalogo</a>
                  </div>
</div>

          <div class="table-container">

        </div>


													</div>
												</div>
												<div id="w4-profile" class="tab-pane">
													<div class="form-group">




                          <div class="form-group">
                            <div class="col-sm-4">
                              <select class="form-control" name="exp-month" required>
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Deciembre</option>
                              </select>
                            </div>
                            <div class="col-sm-4">
                              <select class="form-control" name="exp-year" required>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                              </select>
                            </div>
                          </div>
                        <br></br>
                          <button class="btn btn-info">Agregar</button>


<div class="card card-cascade narrower">

  <!--Card image-->
  <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">




  </div>
  <!--/Card image-->

  <div class="px-4">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table table-hover mb-0">

        <!--Table head-->
        <thead>
          <tr>
            <th class="th-lg">
              <a>Mes
                <i class="fa fa-sort ml-1"></i>
              </a>
            </th>
            <th class="th-lg">
              <a >Año
                <i class="fa fa-sort ml-1"></i>
              </a>
            </th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
          <tr>
            <td>Enero</td>
            <td>2018</td>

          </tr>
          <tr>

            <td>Marzo</td>
            <td>2018</td>

          </tr>
          <tr>

            <td>Mayo</td>
            <td>2018</td>

          </tr>
          <tr>

            <td>Enero</td>
            <td>2019</td>

          </tr>
          <tr>

            <td>Febrero</td>
            <td>2019</td>

          </tr>
        </tbody>
        <!--Table body-->
      </table>
      <!--Table-->
    </div>

  </div>

</div>



												</div>
											</div>
												<div id="w4-billing" class="tab-pane">

						<div class="row">
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
						
										<h2 class="panel-title">Agremiado</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>Civ</th>
														<th>Nombre</th>
														<th>Apellido</th>
														<th>Especialidad</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>321</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>Ing Informatica</td>
														<td class="actions">

															<a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
															<a href=""><i class="fa fa-pencil" title="Edita la fila"></i></a>

														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</section>
							</div>
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
						
										<h2 class="panel-title">Solvencias</h2>
									</header>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>Mes</th>
														<th>Año</th>
														<th>Monto</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Noviembre</td>
														<td>2018</td>
														<td>120 bs S</td>
													
														<td class="actions">

															<a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
														</td>
													</tr>
													<tr>
														<td>Diciembre</td>
														<td>2018</td>
														<td>230 bs S</td>
														<td class="actions">

															<a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
														</td>
													</tr>
													<tr>
														<td>Enero</td>
														<td>2019</td>
														<td>1000 bs S</td>
														
														<td class="actions">

															<a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="col-sm-4">
											<label class="text-danger">Sub Total: 1350</label>
											<label class="text-success">Total:1500</label>
										</div>

									</div>
							</div>
						</div>



                      <div class="row">
                          <div class="col-md-6">
                          <label class="control-label">Pago</label>
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <label class="control-label">Tipo de Pago</label>
                          <select class="form-control" multiple="multiple" data-plugin-multiselect id="ms_example0">
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia" selected>Transferencia</option>
                            <option value="depocito">Deposito</option>
                          </select>
                        </div>
                          </div>
												</div>


  
												<div id="w4-confirm" class="tab-pane">


<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Fecha: 25 Marzo, 2019</em>
                    </p>
                    <p>
                        <em>Recibo #: 34522677W</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Recibo</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mes</th>
                            <th>Año</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-4"><em>Noviembre</em></h4></td>
                             <td class="col-md-4"><em>2018</em></h4></td>
                            <td class="col-md-1 text-center">100 bs S</td>
                            <td class="col-md-1 text-center">150 bs S</td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><em>Diciembre</em></h4></td>
                             <td class="col-md-4"><em>2018</h4></td>
                            <td class="col-md-1 text-center">300 bs S</td>
                            <td class="col-md-1 text-center">500 bs S</td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><em>Enero</em></h4></td>
                             <td class="col-md-4"><em>2019</em></h4></td>
                            <td class="col-md-1 text-center">800 bs S</td>
                            <td class="col-md-1 text-center">1000 bs S</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>1200 bs S</strong>
                            </p>
                            <p>
                                <strong>1650 bs S</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-block">
                    Registrar<span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div>		



												</div>
											</div>
										</form>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled">
												<a><i class="fa fa-angle-left"></i>Anterior</a>
											</li>
											<li class="finish hidden pull-right">
												<a>Finalizar</a>
											</li>
											<li class="next">
												<a>Siguiente <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</section>
							</div>







<!--


								SOLVENCIA TECNICA

-->


              <div class="col-xs-12">
                <section class="panel form-wizard" id="w4">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="#" class="fa fa-caret-down"></a>

                    </div>
            
                    <h2 class="panel-title">Solvencia Tecnica</h2>
                  </header>
                  <div class="panel-body">
                    <div class="wizard-progress wizard-progress-lg">
                      <div class="steps-progress">
                        <div class="progress-indicator"></div>
                      </div>
                      <ul class="wizard-steps">
                        <li class="active">
                          <a href="#w4-account2" data-toggle="tab"><span>1</span>Agremiado</a>
                        </li>
                        <li>
                          <a href="#w4-profile2" data-toggle="tab"><span>2</span>Tipo de Certificado</a>
                        </li>
                        <li>
                          <a href="#w4-billing2" data-toggle="tab"><span>3</span>Confirmar Pago</a>
                        </li>
                        <li>
                          <a href="#w4-confirm2" data-toggle="tab"><span>4</span>infromacion</a>
                        </li>
                      </ul>
                    </div>
            
                    <form class="form-horizontal" novalidate="novalidate">
                      <div class="tab-content">
                        <div id="w4-account2" class="tab-pane active">
                          <div class="form-group">

<div class="col-md-4 col-sm-4">

                  <label>Nombre Agremiado</label>
                      <div class="form-inline">
                    
                    <input type="text" name="codigo" id="codigo" class="form-control input-sm" readonly="readonly"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="">
                    <a class=" modal-basic btn btn-info" href="#catalogoAgremiado">Catalogo</a>
                  </div>
          
</div>


                          </div>
                        </div>
                        <div id="w4-profile2" class="tab-pane">
                          <div class="form-group">




                          <div class="form-group">
                            <div class="col-sm-4">
                              Tipo de Certificado
                              <select class="form-control" name="exp-month" required>
                                <option>Cepir</option>
                                <option>Visado</option>
                              </select>
                            </div>
                          </div>
                        <br></br>



                        </div>
                      </div>
                        <div id="w4-billing2" class="tab-pane">

            <div class="row">
              <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
            
                    <h2 class="panel-title">Agremiado</h2>
                  </header>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table mb-none">
                        <thead>
                          <tr>
                            <th>Civ</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especialidad</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>321</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Ing Informatica</td>
                            <td class="actions">

                              <a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
                              <a href=""><i class="fa fa-pencil" title="Edita la fila"></i></a>

                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
            
                    <h2 class="panel-title">Certificacion</h2>
                  </header>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table mb-none">
                        <thead>
                          <tr>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Noviembre</td>
                            <td>2018</td>
                            <td>120 bs S</td>
                          
                            <td class="actions">

                              <a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>Diciembre</td>
                            <td>2018</td>
                            <td>230 bs S</td>
                            <td class="actions">

                              <a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>Enero</td>
                            <td>2019</td>
                            <td>1000 bs S</td>
                            
                            <td class="actions">

                              <a href="" class="delete-row"><i class="fa fa-trash-o" title="Eliminar la fila"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="col-sm-4">
                      <label class="text-danger">Sub Total: 1350</label>
                      <label class="text-success">Total:1500</label>
                    </div>

                  </div>
              </div>
            </div>



                      <div class="row">
                          <div class="col-md-6">
                          <label class="control-label">Pago</label>
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <label class="control-label">Tipo de Pago</label>
                          <select class="form-control" multiple="multiple" data-plugin-multiselect id="ms_example0">
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia" selected>Transferencia</option>
                            <option value="depocito">Depocito</option>
                          </select>
                        </div>
                          </div>
                        </div>


  
                        <div id="w4-confirm2" class="tab-pane">


<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Fecha: 25 Marzo, 2019</em>
                    </p>
                    <p>
                        <em>Recibo #: 34522677W</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Recibo</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mes</th>
                            <th>Año</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-4"><em>Noviembre</em></h4></td>
                             <td class="col-md-4"><em>2018</em></h4></td>
                            <td class="col-md-1 text-center">100 bs S</td>
                            <td class="col-md-1 text-center">150 bs S</td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><em>Diciembre</em></h4></td>
                             <td class="col-md-4"><em>2018</h4></td>
                            <td class="col-md-1 text-center">300 bs S</td>
                            <td class="col-md-1 text-center">500 bs S</td>
                        </tr>
                        <tr>
                            <td class="col-md-4"><em>Enero</em></h4></td>
                             <td class="col-md-4"><em>2019</em></h4></td>
                            <td class="col-md-1 text-center">800 bs S</td>
                            <td class="col-md-1 text-center">1000 bs S</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>1200 bs S</strong>
                            </p>
                            <p>
                                <strong>1650 bs S</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-block">
                    Registrar<span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div>    



                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="panel-footer">
                    <ul class="pager">
                      <li class="previous disabled">
                        <a><i class="fa fa-angle-left"></i>Anterior</a>
                      </li>
                      <li class="finish hidden pull-right">
                        <a>Finalizar</a>
                      </li>
                      <li class="next">
                        <a>Siguiente <i class="fa fa-angle-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </section>
              </div>





                  <div id="catalogoAgremiado" class="modal-block mfp-hide">
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








@endsection

		@section('js')
      <script src="{{ asset('assets/assets/javascripts/ui-elements/examples.modals.js') }} "></script>
		<script src="{{asset('assets/assets/javascripts/forms/examples.wizard.js')}} "></script>
		@endsection