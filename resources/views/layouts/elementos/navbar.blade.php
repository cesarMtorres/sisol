  <nav class="navbar navbar-inverse" style="background-color: #000061">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="color: white" href="#">SISOL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

       <li class="dropdown">
          <a   href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="color: white;background-color: #000061"  aria-haspopup="true" aria-expanded="false"><span class="icon icon-tools"></span>Archivo<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href="{{ route('agremiado.index') }}">Agremiado</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ ('cfamiliar.index') }}">Carga Familiar</a></li>
           <li><a href="{{ ('tarifa.index') }}">Tarifas</a>
          <li><a  href="{{ ('universidad.index') }}">Universidad</a></li>
           <li><a  href="{{ ('especialidad.index') }}">Especialidad</a></li> 
           </li>
         </ul>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button" style="color: white;background-color: #000061" aria-haspopup="true" aria-expanded="false"><span class="icon icon-cog"></span>Proceso<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Solvencia</a></li>
            <li><a href="#">Cepir</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Visado</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: white" href="#"><span class="icon-help"></span>Ayuda</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;background-color: #000061" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span>Sesi&oacuten<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Configuraci&oacuten</a></li>
            <li><a href="#">Informaci&oacuten</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Cerrar Sesi&oacuten</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>