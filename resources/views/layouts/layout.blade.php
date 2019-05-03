<!doctype html>
<html class="fixed">
  <head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title','DASHBOARD')</title>
    <meta name="keywords" content="HTML5 Admin" />
    <meta name="description" content="SISOL Admin">
    <meta name="author" content="Cesar Molina">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}" />
    @yield('css')
     <link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/assets/vendor/morris/morris.css ')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/stylesheets/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/assets/vendor/modernizr/modernizr.js') }}"></script>

  </head>
  <body>
    <section class="body">

      <!-- start: header -->
      <header class="header">
        <div class="logo-container">
          <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset("images/logo.PNG")}}" height="40" alt="SISOL" />
            
          </a>
          <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
          </div>
        </div>
      
        <!-- start: search & user box -->
        <div class="header-right">
      
      
          <span class="separator"></span>
      
          <ul class="notifications">

            <li>
              <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                <i class="fa fa-bell"></i>
                <span class="badge">2</span>
              </a>
      
              <div class="dropdown-menu notification-menu">
                <div class="notification-title">
                  <span class="pull-right label label-default">3</span>
                  Alerts
                </div>
      
                <div class="content">
                  <ul>
                    <li>
                      <a href="#" class="clearfix">
                        <div class="image">
                          <i class="fa fa-thumbs-down bg-danger"></i>
                        </div>
                        <span class="title">planos denegados!</span>
                        <span class="message">Justo ahora</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="clearfix">
                        <div class="image">
                          <i class="fa fa-signal bg-success"></i>
                        </div>
                        <span class="title">agremiado registrador</span>
                        <span class="message">25/03/2019</span>
                      </a>
                    </li>
                  </ul>
      
                  <hr />
      
                  <div class="text-right">
                    <a href="#" class="view-more">View All</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>

          <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
              <figure class="profile-picture">
                <img src="assets/images/!logged-user.jpg" alt="Cesar" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
              </figure>
              <div class="profile-info">
               

                  @if(Route::has('login')) 
   
                <span class="name">
     
                  <span class="role"> {{ Auth::user()->name }}</span>
                </span>


                @if(Auth::user()->id==1)     
                  <span class="role">Administrador</span> 
                @else
                  <span class="role">Usuario</span>    
                @endif
                   @endif
                   @guest
                   <span class="role">Invitado</span>
                   @endguest

              </div>
              <i class="fa custom-caret"></i>
            </a>
      
            <div class="dropdown-menu">
              @auth
               
              <ul class="list-unstyled">
                <li class="divider"></li>
                <li>
                  <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i>Mi Perfil</a>
                </li>
                @if(Auth::user()->id==1)
                   <li >
                    <a href="{{ route('configuracion.index') }}">
                      <i class="fa fa-wrench" aria-hidden="true"></i>
                      <span>Configuración</span>
                    </a>
                  </li>
      <!--          <li>
                  <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                </li> -->
                  <li>
                   @endif
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="fa fa-power-off"></i>
                    <span>Cerrar Sesion</span>
                     </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                   </form>
               </li>
              </ul>
              
              @endauth
            </div>
          </div>
        </div>
        <!-- end: search & user box -->
      </header>
      <!-- end: header -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
        @if(Route::has('login')) 

        <aside id="sidebar-left" class="sidebar-left">
        
          <div class="sidebar-header">
            <div class="sidebar-title">
              @yield('APP')
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
              <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
          </div>
    

          <div class="nano">
            <div class="nano-content">
              <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                  
                    @auth  
                   @if(Auth::user()->id==1)
                  <li class="nav-active">
                    <a href="{{ route('dashboard') }}">
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <span>dashboard</span>
                    </a>
                  </li>
                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-copy" aria-hidden="true"></i>
                      <span>Archivo</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="{{ route('agremiado.index') }} ">
                           Agremiado
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('especialidad.index') }}">
                           Especialidad
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('universidad.index') }}">
                           Universidad
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('instituto.index') }}">
                           Instituto
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('tarifa.index') }}">
                           Tarifa
                        </a>
                      </li>

                      <li>
                        <a href="{{ route('baremo.index') }}">
                           Instrumento (baremos)
                        </a>
                      </li>                      
                      <li>
                        <a href="{{ route('parentesco.index') }}">
                           Parentesco
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('cfamiliar.index') }}">
                           Carga Familiar
                        </a>
                      </li>
            <!--            <li>
                        <a href="">
                           Proyecto
                        </a>-->
                      </li>              
                      <li>
                        <a href="{{ route('tproyecto.index') }}">
                           Motivo
                        </a>
                      </li>  
              <!--        <li>
                        <a href="">
                           Pago
                        </a>
                      </li> -->                                                                                                                     
                      <li>
                        <a href="{{ route('tpago.index') }}">
                           Tipo Pago
                        </a>
                      </li> 
                      <li>
                        <a href="{{ route('funcion.index') }}">
                           funcion
                        </a>
                      </li>                                                             

                      <li>
                        <a href="{{ route('perfil.index') }}">
                           Perfil
                        </a>
                      </li>                    
                      <li>
                        <a href="{{ route('usuario.index') }}">
                           Usuario
                        </a>
                      </li>                      
                    </ul>
                  </li>
                  
  
                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-tasks" aria-hidden="true"></i>
                      <span>Proceso</span>
                    </a>
                    <ul class="nav nav-children">
                         <li class="nav-parent">
                    <a>
                      <span>Solvencia</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="{{ route('solvencia.index') }}">
                           Administrativa
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('solvenciat.index') }}">
                           Tecnica
                        </a>
                      </li>
                    </ul>
                  </li>
                      <li>
                        <a href="{{ route('cepir.index') }}">
                           Cepir
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('auditoria.index') }}">
                           Auditoria
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('visado.index') }}">
                           Visado
                        </a>
                      </li>                    

                    </ul>
                  </li>
                     <li class="nav-parent">
                    <a>
                      <i class="fa  fa-cogs" aria-hidden="true"></i>
                      <span>Mantenimiento</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="#">
                           Bitacora
                        </a>
                      </li>
                      <li>
                        <a href="#">
                           Respaldar Y Restaurar
                        </a>
                      </li>
                    </ul>
                  </li>
                  @endif
              @if(Auth::user()->id==2)
                    <li class="nav-parent">
                    <a>
                      <i class="fa fa-question-circle" aria-hidden="true"></i>
                      <span>Ayuda</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="tables-basic.html">
                           Manual de Usuario
                        </a>
                      </li>
                      <li>
                        <a href="tables-advanced.html">
                           Manual del Sistema
                        </a>
                      </li>
                    </ul>
                  </li>
                  @endif
                   <li class="nav">
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-1').submit();">
                      <i class="fa fa-power-off"></i>
                    <span>Cerrar Sesion</span>
                     </a>

                    <form id="logout-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                   </form>
                  </li>


                    

                  @endauth

                    @guest
                      <li class=""><a href="{{ route('login') }}"><i class="fa fa-user"></i>Entrar</a></li>
                      <li><a href="{{ route('register') }}"><i class="fa fa-save"></i>Registrar</a></li>
                                        <li class="nav-parent">
                    <a>
                      <i class="fa fa-question-circle" aria-hidden="true"></i>
                      <span>Ayuda</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a href="tables-basic.html">
                           Manual de Usuario
                        </a>
                      </li>
                      <li>
                        <a href="tables-advanced.html">
                           Manual del Sistema
                        </a>
                      </li>
                    </ul>
                  </li>
                   @endguest
                  


                </ul>

              </nav>
        
              <hr class="separator" />
        
        
              <hr class="separator" />
        
            </div>
        
          </div>
           
            
        
        </aside>
        @endif
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>@yield('panel_name','Dashboard')</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li><span>@yield('panel_rigth','Dashboard')</span></li>
              </ol>
          
              <a class="sidebar-right-toggle" ></i></a>
            </div>
          </header>


         @yield('content')
       
        </section>
      </div>


    </section>


    <!-- Vendor -->
    <script src="{{ asset('assets/assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    
    <!-- Specific Page Vendor -->
    <script src="{{ asset('assets/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/raphael/raphael.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/gauge/gauge.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/snap-svg/snap.svg.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/jquery.vmap.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js') }}"></script>
    <script src="{{ asset('assets/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js') }}"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/assets/javascripts/theme.js')}}"></script>
    
    <!-- Theme Custom -->
    <script src="{{ asset('assets/assets/javascripts/theme.custom.js')}}"></script>
    
    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/assets/javascripts/theme.init.js')}}"></script>


    <!-- Examples -->
        @yield('js')

  </body>
</html>