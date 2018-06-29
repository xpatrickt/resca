<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>RESCA | GRA</title>
    <meta name="Description" content="Registro y Seguimiento de Certificaciones Ambientales">
    <link rel="icon" type="image/x-icon" href="{{asset('plantilla/images/favicon.png')}}" />
    <link rel="stylesheet" href="{{asset('plantilla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="{{asset('text/css')}}" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <link rel="stylesheet" href="{{asset('plantilla/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/css/material.min.css')}}" />
    <link rel="stylesheet" href="{{asset('plantilla/css/mdl-selectfield.min.css')}}">
    <link rel="stylesheet" href="{{asset('plantilla/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('plantilla/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('plantilla/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('plantilla/css/flexslider.css')}}" />




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


</head>
<body>
    <!-- Start Header -->
    <header id="header">
        <!-- Start Header Top Section -->
        <div id="hdr-top-wrapper">
            <div class="layer-stretch hdr-top">
                <div class="hdr-top-block hidden-xs">
                    <div id="hdr-social">
                        <ul class="social-list social-list-sm">
                            <li><a class="width-auto font-13">Búscanos : </a></li>
                            <li><a href="https://web.facebook.com/Gerencia-de-Recursos-Naturales-GRA-2102276290097520/?modal=admin_todo_tour" target="_blank" id="hdr-facebook" ><i class="fa fa-facebook" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-facebook">Facebook</span></li>
                            <li><a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank" id="hdr-google" ><i class="fa fa-google" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-google">Google</span></li>
                            <li><a href="https://www.youtube.com/channel/UCGyoXgSzHgbPHFzEeI91-5g/featured" target="_blank" id="hdr-youtube" ><i class="fa fa-youtube" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-youtube">Youtube</span></li>
                        </ul>
                    </div>
                </div>
                <div class="hdr-top-line hidden-xs"></div>
                <div class="hdr-top-block hdr-number">
                    <div class="font-13">
                        <i class="fa fa-mobile font-20 tbl-cell"> </i> <span class="hidden-xs tbl-cell"> Comuníquese : </span> <span class="tbl-cell">083 321022 Anexo 106</span>
                    </div>
                </div>
                <div class="hdr-top-line"></div>
                <div class="hdr-top-block">
                    @if (Route::has('login'))
                    <div class="theme-dropdown">
                        @auth
                        <a id="profile-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13" href="{{ url('/admin/index') }}"><i class="fa fa-user-o color-black"></i> Mi cuenta</a>
                        @else
                        <a id="profile-menu" class="mdl-button mdl-js-button mdl-js-ripple-effect font-13"><i class="fa fa-user-o color-black"></i> Acceder</a>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect metarial-menu" data-mdl-for="profile-menu">
                            <li class="mdl-menu__item"><a href="{{ route('login') }}">
                            <i class="fa fa-sign-in"></i>Loguearse</a></li>
                           <!-- <li class="mdl-menu__item"><a href="{{ route('register') }}"><i class="fa fa-user-o"></i>Registrarse</a></li>
                            --></ul>
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- End Header Top Section -->
        <!-- Start Main Header Section -->
        <div id="hdr-wrapper">
            <div class="layer-stretch hdr">
                <div class="tbl">
                    <div class="tbl-row">
                        <!-- Start Header Logo Section -->
                        <div class="tbl-cell hdr-logo">
                            <a href="#"><img src="plantilla/images/logo.png" alt=""></a>
                        </div><!-- End Header Logo Section -->
                        <div class="tbl-cell hdr-menu">
                            <!-- Start Menu Section -->
                            <ul class="menu">
                                <!-- Inicio -->
                                <li>
                                    <a id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect" href="{{ url('/') }}">Inicio <i class="fa fa-home"></i></a>
                                </li>

                                   <li>
                                    <a id="menu-blog" class="mdl-button mdl-js-button mdl-js-ripple-effect">Nosotros<i class="fa fa-chevron-down"></i>
                                    </a>
                                    <ul class="menu-dropdown">
                                       
                                        <li>
                                            <a href= "https://www.regionapurimac.gob.pe/" target="_blank" > Gobierno Regional de Apurimac</a>
                                            <ul class="menu-dropdown">
                                                <li><a href="{{ url('/RecursosNat') }}">Ger.Reg. de Rec. Nat. y GMA</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a> Direcciones Regionales</a>
                                            <ul class="menu-dropdown">
                                               <li><a href="{{ url('/DRAgricultura') }}">D.R.Agricultura</a></li>
                                                <li><a href="{{ url('/DREducacion') }}">D.R.Educación</a></li>
                                                <li><a href="{{ url('/DRSalud') }}">D.R.Salud</a></li>
                                                <li><a href="{{ url('/DRMinas') }}">D.R.Energia y Minas</a></li>
                                                <li><a href="{{ url('/DRProduccion') }}">D.R.Producción</a></li>
                                                <li><a href="{{ url('/DRTurismo') }}">D.R.C.E y Turismo</a></li>
                                                <li><a href="{{ url('/DRVivienda') }}">D.R.Vivienda y const.</a></li>
                                                <li><a href="{{ url('/DRTransporte') }}">D.R.Transp. y Comu.</a></li> 
                                            </ul>
                                        </li>
                                                               
                                    </ul>
                                </li>
                                <li class="menu-megamenu-li">
                                    <a id="menu-doctor" class="mdl-button mdl-js-button mdl-js-ripple-effect">Menú Principal<i class="fa fa-chevron-down"></i></a>
                                    <ul class="menu-megamenu">
                                        <li class="row">
                                            <div class="col-lg-4">
                                                <div class="megamenu-ttl">RESCA</div>
                                                <ul>
                                                    <li><a href="{{ url('/certificacionambiental') }}">Certificación Ambiental</a></li>
                                                    <li><a href="{{ url('/ventanillaunica') }}">Ventanilla Única</a></li>
                                                    <li><a href="{{ url('/resultadoevaluacion') }}">Resultados de Evaluación Ambiental</a></li>
                                                    <li><a href="{{ url('/pautasorientacion') }}">Pautas de Orientación</a></li>   
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="megamenu-ttl">DOCUMENTOS</div>
                                                <ul>
                                                    <li><a href="{{ url('/tupa') }}">TUPA</a></li>
                                                    <li><a href="{{ url('/Mapro') }}">MAPRO</a></li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-4 d-none d-sm-none s-md-none d-lg-block d-xl-block">
                                                <div class="megamenu-ttl">REPORTES DE E.A.</div>
                                                <div class="doctor-skills mt-2">
                                                    <p class="font-14">Aprobado <span class="badge badge-primary badge-pill float-right">75%</span></p>
                                                    <div class="progress progress-sm mb-4">
                                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="doctor-skills">
                                                    <p class="font-14">Observado<span class="badge badge-danger badge-pill float-right">65%</span></p>
                                                    <div class="progress progress-sm mb-4">
                                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="doctor-skills">
                                                    <p class="font-14">Desaprobado <span class="badge badge-warning badge-pill float-right">87%</span></p>
                                                    <div class="progress progress-sm mb-4">
                                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                                                  <li>
                                    <a id="menu-blog" class="mdl-button mdl-js-button mdl-js-ripple-effect">Contacto<i class="fa fa-chevron-down"></i>
                                    </a>
                                    <ul class="menu-dropdown">
                                        <li>
                                            <a href="{{ url('/ubicacion') }}">Ubicación</a>
                                        </li>
                                       <!--  <li>
                                            <a href="#">Correo</a>
                                        </li>
                                         <li>
                                            <a href="#">Datos de Contacto</a>
                                        </li>-->
                                    </ul>
                                </li>
        


                                <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                            </ul><!-- End Menu Section -->
                            <div id="menu-bar"><a><i class="fa fa-bars"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Main Header Section -->
    </header><!-- End Header -->
    <!-- Start Page Title Section -->
    <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                @yield('pagina')
                <p><a href="@yield('url')">@yield('menu')</a> &#8594; @yield('pagina1')</p>
            </div>
        </div>
    </div><!-- End Page Title Section -->
    <!-- Start Faq Section -->
    <div class="layer-stretch">
      <div class="layer-wrapper text-center">
           <div class="layer-fixed">
               
                @yield('contenido')
            
            </div>
        </div>
    </div><!-- End FAQ Section -->

   
    <!-- Start Footer Section -->
    <footer id="footer">
        <div class="layer-stretch">
            <!-- Start main Footer Section -->
            <div class="row layer-wrapper">
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Contactenos</p></div>
                    <div class="footer-container footer-a">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-map-marker"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-small paragraph-white">
                                        Gobierno Regional de Apurímac<br />
                                        Jr. Puno 107, Abancay-Apurímac
                                    </p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-small paragraph-white">Telefon Central : 083 321022 Anexo 106</p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-small paragraph-white">grnaturales@regionapurimac.gob.pe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Enlaces de interes</p></div>
                    <div class="footer-container footer-b">
                        <div class="tbl">
                            <div class="tbl-row">
                                <ul class="tbl-cell">
                                    <li><a href="https://www.senace.gob.pe/" Target="_blank"> SENACE </a></li>
                                    <li><a href="http://www.minam.gob.pe/" Target="_blank" >MINAM</a></li>
                                    <li><a href="https://www.oefa.gob.pe/" Target="_blank">OEFA</a></li>
                                    <li><a href="http://www.sernanp.gob.pe/" Target="_blank">SERNAMP</a></li>
                                    <li><a href="http://www.ana.gob.pe/" Target="_blank"> ANA </a></li>                                   
                                </ul>
                                <ul class="tbl-cell">
                                    <li><a href="https://www.serfor.gob.pe/" Target="_blank">SERFOR</a></li>
                                    <li><a href="http://www.igp.gob.pe/" Target="_blank">IGP </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Síganos en</p></div>
                    <div class="footer-container footer-c">

                        <ul class="social-list social-list-colored footer-social">
                            <li>
                                <a href="https://web.facebook.com/Gerencia-de-Recursos-Naturales-GRA-2102276290097520/?modal=admin_todo_tour" target="_blank" id="footer-facebook" class="fa fa-facebook"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank" id="footer-google" class="fa fa-google"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-google">Google</span>
                            </li>
                           
                            <li>
                                <a href="https://www.youtube.com/channel/UCGyoXgSzHgbPHFzEeI91-5g/featured" target="_blank" id="footer-youtube" class="fa fa-youtube"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-youtube">Youtube</span>
                            </li>                   
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End main Footer Section -->
        <!-- Start Copyright Section -->
        <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white">2018 © Gobierno Regional de Apurímac TODOS LOS DERECHOS RESERVADOS.</div>
            </div>
        </div><!-- End of Copyright Section -->
    </footer><!-- End of Footer Section -->

    <!-- **********Included Scripts*********** -->

    <!-- Jquery Library 2.1 JavaScript-->
    <script src="{{asset('plantilla/js/jquery-2.1.4.min.js')}}"></script>
    <!-- Popper JavaScript-->
    <script src="{{asset('plantilla/js/popper.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="{{asset('plantilla/js/bootstrap.min.js')}}"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="{{asset('plantilla/js/material.min.js')}}"></script>
    <!-- Material Select Field Script -->
    <script src="{{asset('plantilla/js/mdl-selectfield.min.js')}}"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="{{asset('plantilla/js/jquery.flexslider.min.js')}}"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="{{asset('plantilla/js/owl.carousel.min.js')}}"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="{{asset('plantilla/js/jquery-scrolltofixed.min.js')}}"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="{{asset('plantilla/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="{{asset('plantilla/js/jquery.waypoints.min.js')}}"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="{{asset('plantilla/js/jquery.counterup.js')}}"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="{{asset('plantilla/js/smoothscroll.min.js')}}"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="{{asset('plantilla/js/custom.js')}}"></script>
 


 <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/1.11.2/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>
<!--<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>  -->
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js')}}"></script>
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('js/change.js')}}"></script>





<script src="{{asset('plantilla/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-93901876-1', 'auto');
        ga('send', 'pageview');
    </script>
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



  })
</script>


</body>
</html>