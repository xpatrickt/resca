<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GRA | RESCA</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/skin-blue.min.css')}}">

 <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

 
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/flat/blue.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RS</b>CA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RESCA</b>-GRA</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
           <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
          <ul class="dropdown-menu">
              <li class="header">Tu tienes 4 mensajes</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Equipo de Soporte
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p></p>
                    </a>
                  </li>
                </ul>
                 </li>
              <li class="footer"><a href="#">Ver todos los mensajes</a></li>
            </ul>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 10 nuevas notificaciones</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 nuevos registros hoy
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver Todo</a></li>
            </ul>
          </li>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 9 actividades</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        
                       <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Completado</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Ver todas las tareas</a>
              </li>
            </ul>
          </li>  -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('adminlte/dist/img/resca1.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Bienvenido {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('adminlte/dist/img/resca1.jpg')}}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }}

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
               <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
               Cerrar Sesión</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('adminlte/dist/img/resca1.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
         <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        @can('admin.registro.index')
        <li class="@yield('actmenu1')"><a href="{{url ('admin/registro')}}"><i class="fa fa-flag-o"></i> <span>Registros Ambientales</span></a></li>
       @endcan

        
        <li class="@yield('actmenu2')">
          @can('admin.evaluacion.index')
          <a href="#"><i class="fa fa-dashboard"></i><span>Evaluación Ambiental</span>@endcan
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            @can('admin.evaluacionestudio.index')
            <li class="@yield('acteve')"><a href="{{url ('admin/evaluacionestudio')}}">Asignar Evaluador</a></li>
            @endcan
            @can('admin.evaluacion.index')
            <li class="@yield('acteva')"><a href="{{url ('admin/evaluacion')}}">Evaluación</a></li>
            @endcan
            @can('admin.certificacion.index')
            <li class="@yield('actcer')"><a href="{{url ('admin/certificacion')}}">Certificación</a></li>            
             @endcan        
          </ul>
        </li>
      
        @can('admin.seguimiento.index')
        <li class="@yield('actmenu3')"><a href="{{url ('admin/seguimiento')}}"><i class="fa fa-dashboard"></i> <span>Seguimiento</span></a></li>
       @endcan
        <li class="@yield('treemenu')">
          <a href="#"><i class="fa fa-link"></i><span>Mantenimiento</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            @can('admin.proyecto.index')
            <li class="@yield('actpro')"><a href="{{url ('admin/proyecto')}}">Proyecto</a></li>
            @endcan
            @can('admin.actividad.index')
            <li class="@yield('actact')"><a href="{{url ('admin/actividad')}}">Actividad</a></li>
            @endcan
            @can('admin.cargo.index')
            <li class="@yield('actcar')"><a href="{{url ('admin/cargo')}}">Cargo</a></li>   
            @endcan         
            @can('admin.entidad.index')
            <li class="@yield('actent')"><a href="{{url ('admin/entidad')}}">Entidad</a></li>
            @endcan         
            @can('admin.persona.index')
            <li class="@yield('actper')"><a href="{{url ('admin/persona')}}">Personas</a></li>
            @endcan         
            @can('admin.departamento.index')
            <li class="@yield('actdep')"><a href="{{url ('admin/departamento')}}">Departamento</a></li>
            @endcan         
            @can('admin.provincia.index')
            <li class="@yield('actprov')"><a href="{{url ('admin/provincia')}}">Provincia</a></li>
            @endcan         
            @can('admin.distrito.index')
            <li class="@yield('actdis')"><a href="{{url ('admin/distrito')}}">Distrito</a></li>
            @endcan         
            @can('admin.estado.index')
            <li class="@yield('actest')"><a href="{{url ('admin/estado')}}">Estado del estudio</a></li>
            @endcan         
            @can('admin.documento.index')
            <li class="@yield('actdoc')"><a href="{{url ('admin/documento')}}">Documentos de Estudio</a></li>
            @endcan         
            @can('admin.tipoestudio.index')
            <li class="@yield('acttes')"><a href="{{url ('admin/tipoestudio')}}">Tipo de Estudio</a></li>
            @endcan         
            @can('admin.tipoevaluacion.index')
            <li class="@yield('acttev')"><a href="{{url ('admin/tipoevaluacion')}}">Tipo de Evaluación</a></li>  
            @endcan 
          </ul>
        </li>
        @can('admin.user.index')
          <li class="@yield('actgusu')"><a href="{{url ('admin/user')}}"><i class="fa fa-users"></i> <span>Gestión de Usuarios</span></a></li>
        @endcan 



      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('contenido')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Gobierno Regional de Apurímac
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://regionapurimac.gob.pe/">GRA</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
     <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Actividades Recientes</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="#">Actividad 01</a>
           <!-- <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>-->

              <!--<div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>-->
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Progreso de Actividades</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
               
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
     <!--  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
  
     <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          
        </form>
      </div>
     
    </div>-->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/1.11.2/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>

<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- ssss -->


<!-- ssss end-->


<!-- Select2 -->
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js')}}"></script>




<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('js/change.js')}}"></script>

<script src="{{asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<script>
  $(function () {

    $('#tabla').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
      'order':true
    })
    $('#tabla2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
      'order':true
    })
    $('#tabla3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
      'order':true
    })

    //Add text editor
    $("#compose-textarea").wysihtml5();


  })
</script>

<script>
  $(function () {

     //Initialize Select2 Elements
    $('.select2').select2();
    $('#datepicker').datepicker({
    autoclose: true 

    });

    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
@yield('script')

</body>
</html>