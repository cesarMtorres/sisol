@yield('modal')
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
          <h3 class="panel-title">Nueva Empresa</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">

                  <div id="Crearmodal" class="modal-block  mfp-hide">
                    <section class="panel">
                      <header class="panel-heading">
                        <h2 class="panel-title text-center">Registrar Empresa</h2>
                      </header>
                      <div class="panel-body">
                        <div class="modal-wrapper">
                          <div class="modal-text">
                         <div class="row">   
                        <form method="POST" action="{{ route('especialidad.store') }}"  role="form">
                            {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PATCH">

                  <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" title="Campo: Nombre" name="nombre" id="nombre" class="form-control input-sm" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ old('nombre') }}">
                  </div>
                  </div>
   
                            </form>
                        </div>
                          </div>
                        </div>
                      </div>
                      <footer class="panel-footer">
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button class="btn btn-primary modal-confirm">Registrar</button>
                            <button class="btn btn-default modal-dismiss">Cancelar</button>
                          </div>
                        </div>
                      </footer>
                    </section>
                  </div>


          </div>
        </div>

      </div>
    </div>
  </section>
