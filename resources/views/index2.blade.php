<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>RESCA | GRA</title>
    <!-- Meta Description Tag -->
    <meta name="Description" content="Registro y Seguimiento de Certificaciones Ambientales">
    <!-- Favicon Icon -->
    <link rel="icon" type="plantilla/image/x-icon" href="plantilla/images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/font-awesome/css/font-awesome.min.css" />
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="plantilla/css/bootstrap.min.css">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/material.min.css" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/mdl-selectfield.min.css">
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/owl.carousel.min.css" />
    <!-- Animate Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/animate.min.css" />
    <!-- Magnific Popup Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/magnific-popup.css" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/flexslider.css" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="plantilla/css/style.css">
</head>
<body>
    <!-- Start Header Section -->
    <header id="header-transparent">
        <div class="layer-stretch hdr-center">
            <div class="row align-items-center">
                <div class="col-5 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    @if (Route::has('login'))
                    <div class="hdr-center-account text-left p-0">
                        @auth
                        <a class="font-14 mr-4" href="{{ url('/admin') }}"><i class="fa fa-sign-in"></i>Administrador</a>
                         @else
                        <a class="font-14 mr-4" href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Acceder</a>
                        <a class="font-14" href="{{ route('register') }}"><i class="fa fa-user-o"></i>Registrarse</a>
                         @endauth
                    </div>
                    @endif
                </div>
                <div class="col">
                    <div class="hdr-center-logo text-center">
                        <a href="index.html" class="d-inline-block"><img src="plantilla/images/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-5 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="pull-right">
                        <ul class="social-list social-list-white">
                            <li>
                                <a href="#" id="hdr-facebook" class="fa fa-facebook rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-twitter" class="fa fa-twitter rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-twitter">Twitter</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-google" class="fa fa-google rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-google">Google</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-instagram" class="fa fa-instagram rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-instagram">Instagram</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-youtube" class="fa fa-youtube rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-youtube">Youtube</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-linkedin" class="fa fa-linkedin rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-linkedin">Linkedin</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-transparent-menu">
            <div class="hdr layer-stretch">
                <div class="row align-items-center justify-content-end">
                    <!-- Start Menu Section -->
                    <ul class="col menu text-left">
                        <li>
                            <a id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect">Home <i class="fa fa-chevron-down"></i></a>
                            <ul class="menu-dropdown">
                                <li><a href="index.html">Home Style 1</a></li>
                                <li><a href="index-1.html">Home Style 2</a></li>
                                <li><a href="index-2.html">Home Style 3</a></li>
                                <li><a href="index-3.html">Home Style 4</a></li>
                                <li><a href="index-4.html">Home Style 5</a></li>
                                <li><a href="index-5.html">Home Style 6</a></li>
                            </ul>
                        </li>
                        <li class="menu-megamenu-li">
                            <a id="menu-pages" class="mdl-button mdl-js-button mdl-js-ripple-effect">Pages <i class="fa fa-chevron-down"></i></a>
                            <ul class="menu-megamenu">
                                <li class="row">
                                    <div class="col-lg-3">
                                        <div class="megamenu-ttl">Link 1</div>
                                        <ul>
                                            <li><a href="event-1.html">Event Style 1</a></li>
                                            <li><a href="event-2.html">Event Style 2</a></li>
                                            <li><a href="event-3.html">Event Style 3</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="503.html">503 Temporarily Unavailable</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="megamenu-ttl">Link 2</div>
                                        <ul>
                                            <li><a href="departments-1.html">Departments Style 1</a></li>
                                            <li><a href="departments-2.html">Departments Style 2</a></li>
                                            <li><a href="gallery.html">Gallery Style 1</a></li>
                                            <li><a href="gallery-1.html">Gallery Style 2</a></li>
                                            <li><a href="404.html">404 Page Not Found</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="megamenu-ttl">Link 3</div>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="invoice.html">Invoice</a></li>
                                            <li><a href="terms-conditions.html">Terms &#38; Conditions</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="theme-img">
                                            <img src="uploads/service-5.jpg" alt="">
                                        </div>
                                    </div>
                                </li> 
                            </ul>
                        </li>
                        <li>
                            <a id="menu-service" class="mdl-button mdl-js-button mdl-js-ripple-effect">Service <i class="fa fa-chevron-down"></i></a>
                            <ul class="menu-dropdown">
                                <li>
                                    <a>Services Style 1</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="services-1.html">Services Style 1</a></li>
                                        <li><a href="services-4.html">Services Style 1 with Right Sidebar</a></li>
                                        <li><a href="services-7.html">Services Style 1 with Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Servcie Style 2</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="services-2.html">Services Style 2</a></li>
                                        <li><a href="services-5.html">Services Style 2 with Right Sidebar</a></li>
                                        <li><a href="service.html">Single Service Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Service Style 3</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="services-3.html">Services Style 3</a></li>
                                        <li><a href="services-6.html">Services Style 3 with Right Sidebar</a></li>
                                        <li><a href="services-8.html">Services Style 3 with Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Services Style 4</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="services-9.html">Services Style 4</a></li>
                                        <li><a href="services-9.html">Services Style 4 with Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="service.html">Service Detail</a></li>
                            </ul>
                        </li>
                        <li class="menu-megamenu-li">
                            <a id="menu-doctor" class="mdl-button mdl-js-button mdl-js-ripple-effect">Doctors <i class="fa fa-chevron-down"></i></a>
                            <ul class="menu-megamenu">
                                <li class="row">
                                    <div class="col-lg-4">
                                        <div class="megamenu-ttl">Doctors Link</div>
                                        <ul>
                                            <li><a href="doctors-1.html">Doctors Style 1</a></li>
                                            <li><a href="doctors-2.html">Doctors Style 2</a></li>
                                            <li><a href="doctors-3.html">Doctors Style 3</a></li>
                                            <li><a href="doctors-4.html">Doctors Style 1 with Right Sidebar</a></li>
                                            <li><a href="doctors-7.html">Doctors Style 1 with Left Sidebar</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="megamenu-ttl">Doctors Link</div>
                                        <ul>
                                            <li><a href="doctors-5.html">Doctors Style 2 with Right Sidebar</a></li>
                                            <li><a href="doctors-6.html">Doctors Style 3 with Right Sidebar</a></li>
                                            <li><a href="doctors-8.html">Doctors Style 3 with left Sidebar</a></li>
                                            <li><a href="doctor-1.html">Doctor Detail Style 1</a></li>
                                            <li><a href="doctor-2.html">Doctor Detail Style 2</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 d-none d-sm-none s-md-none d-lg-block d-xl-block">
                                        <div class="megamenu-ttl">Our Skills &#38; Achievement</div>
                                        <div class="doctor-skills mt-2">
                                            <p class="font-14">Brain Surgery <span class="badge badge-primary badge-pill float-right">75%</span></p>
                                            <div class="progress progress-sm mb-4">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="doctor-skills">
                                            <p class="font-14">Heart Surgery <span class="badge badge-danger badge-pill float-right">65%</span></p>
                                            <div class="progress progress-sm mb-4">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="doctor-skills">
                                            <p class="font-14">General Surgery <span class="badge badge-warning badge-pill float-right">87%</span></p>
                                            <div class="progress progress-sm mb-4">
                                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a id="menu-blog" class="mdl-button mdl-js-button mdl-js-ripple-effect">Blog <i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="menu-dropdown">
                                <li>
                                    <a>Blog Style 1</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="blogs-1.html">Blog style 1</a></li>
                                        <li><a href="blogs-3.html">Blog style 1 with Right Sidebar</a></li>
                                        <li><a href="blogs-5.html">Blog style 1 with Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Blog Style 2</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="blogs-2.html">Blog style 2</a></li>
                                        <li><a href="blogs-4.html">Blog style 2 with Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a>Blog Style 3</a>
                                    <ul class="menu-dropdown">
                                        <li><a href="blogs-6.html">Blog style 3 with Right Sidebar</a></li>
                                        <li><a href="blogs-7.html">Blog style 3 with Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-1.html">Blog Details 1</a></li>
                                <li><a href="blog-2.html">Blog Details 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a id="menu-profile" class="mdl-button mdl-js-button mdl-js-ripple-effect">Profile <i class="fa fa-chevron-down"></i></a>
                            <ul class="menu-dropdown">
                                <li><a href="login.html">Login Page</a></li>
                                <li><a data-toggle="modal" data-target="#loginpopup">Login Popup</a></li>
                                <li><a href="register.html">Register Page</a></li>
                                <li><a data-toggle="modal" data-target="#registerpopup">Register Popup</a></li>
                                <li><a href="myappointment.html">My Appointment Page</a></li>
                                <li><a href="myrequest.html">My Request Page</a></li>
                                <li><a href="myprofile.html">My Profile Page</a></li>
                            </ul>
                        </li>
                        <li><a href="components.html" id="menu-shortcodes" class="mdl-button mdl-js-button mdl-js-ripple-effect">Components</a></li>
                        <li>
                        </li>
                        <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                    </ul><!-- End Menu Section -->
                    <div class="col col-md-auto d-none d-sm-block d-md-block d-lg-block d-xl-block">
                        <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect hdr-apointment"><i class="fa fa-calendar m-0 color-white"></i> Make An Appointment</button>
                    </div>
                    <div class="col-2 col-md-auto col-lg-auto">
                        <div class="mdl-button mdl-js-button mdl-button--fab hdr-search">
                            <i class="fa fa-search fa-2x color-white"></i>
                        </div>
                    </div>
                    <div id="menu-bar" class="col-2 col-md-auto"><a><i class="fa fa-bars color-white"></i></a></div>
                </div>
                <div class="search-banner animated fadeInUp">
                    <input type="text" placeholder="Search your Query ...">
                </div>
            </div>
        </div>
    </header><!-- End Header Section -->
    <!-- Start Slider Section -->
    <div id="slider" class="slider-1 slider-2">
        <div class="flexslider slider-wrapper">
            <ul class="slides">     
                <li>
                    <div class="slider-info">
                        <h1 class="animated fadeInDown">55+ Page Tamplates and Much More</h1>
                        <p class="animated fadeInDown">We have created 55+ Pages, 200+ Components or Shortcodes, Popup for this template and more in future. #twitterhash, @facebooktag</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slider-1.jpg);"></div>
                    <!-- Make an Appointment  Button -->
                    <div class="slider-button slider-appointment">
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  animated fadeInUp">Make An Appointment<i class="fa fa-flag-checkered"></i></a>
                    </div>
                </li>
                <li>
                    <div class="slider-info">
                        <h2>Your Identity. Our Responsibility</h2>
                        <p>This is tag line ipsum dolor sit amet, consectetur Nihil cupiditate. mollitia maiores temp fugit! Lorem ipsum dolor sit amet, consectetur adipisicing elit#twitterhash, @facebooktag</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slider-2.jpg);"></div>
                    <!-- Make an Appointment  Button -->
                    <div class="slider-button">
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  animated fadeInUp">Read More<i class="fa fa-external-link"></i></a>
                    </div>
                </li>
                <li>
                    <div class="slider-info">
                        <h2>24/7 Support Services</h2>
                        <p>Do not hesitate to contact us on our dedicated support forum. mollitia maiores temp fugit! Lorem ipsum dolor sit amet, consectetur adipisicing elit #twitterhash, @facebooktag</p>
                    </div>
                    <div class="slider-backgroung-image" style="background-image: url(uploads/slider-3.jpg);"></div>
                    <!-- Make an Appointment  Button -->
                    <div class="slider-button">
                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  animated fadeInUp">About Us<i class="fa fa-eye"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </div><!-- End Slider Section -->
    <!-- Start Service Section -->
    <div id="hm-service" class="layer-stretch">
        <div class="layer-wrapper">
            <div class="layer-ttl">
                <h3>What We Do</h3>
            </div>
            <div class="layer-container row">
                <div class="hm-service-left col-md-5">
                    <img src="uploads/hm-service.jpg" alt="Klinical Health care">
                </div>
                <div class="hm-service-right col-md-7">
                    <p class="paragraph-medium paragraph-black">Klinik is a HTML5 &#38; CSS3 responsive template created for clinic and hospital but also can be used for generalised website. It is a fully responsive, feature rich and beautifully designed to host a website or create online identity. We have created 55+ pages and 200+ components for this template and much more in future.</p>
                    <div class="hm-service">
                        <div class="hm-service-block">
                            <i class="fa fa-stethoscope"></i>
                            <span>Cardiovascular centre</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-child"></i>
                            <span>Childbirth Center</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-certificate"></i>
                            <span>Mammography</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-h-square"></i>
                            <span>Dermatologist</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-stethoscope"></i>
                            <span>Paediatrics</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-bullhorn"></i>
                            <span>Radiology Center</span>
                        </div>
                    </div>
                    <div class="hm-service-view text-center">
                        <a href="#" class="button-icon">
                            <span>View All Services</span>
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Service Section -->
    <!-- Start About Section -->
    <div id="hm-about" class="parallax-background parallax-background-1">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>Who We Are</h3>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-user-md"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">54</span>
                                <p>Doctor(s)</p>
                            </div>
                        </div>
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-ambulance"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">130</span>
                                <p>Room(s)</p>
                            </div>
                        </div>
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-calendar"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">51</span>
                                <p>Year of Experience(s)</p>
                            </div>
                        </div>
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-clock-o"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">168</span>
                                <p>Opening Hours per Week</p>
                            </div>
                        </div>
                        <div class="hm-about-paragraph">
                            <p class="paragraph-medium paragraph-white">
                                <span class="theme-dropcap color-white">K</span>Reque errem oblique sed et, an fugit omnes impetus qui. Mea et ludus choro, wisi mnesarchum no vim, no aliquip laoreet his. Mutat sapientem similique usu ex, novum docendi inimicus at vis, te sit persecuti philosophia delicatissimi. Mei civibus eloquentiam cu. Unum invidunt adipiscing sea et, corrumpit torquatos pri cu. Malis nihil menandri ea vel, stet possit usu cu. Nec autem graeco ea, ne ferri reque est.No est liber eloquentiam, mei an adhuc dicunt meliore. Purto volutpat vix ut, qui ad sint utinam nominavi. Ea option recusabo eos, no est vide eleifend gloriatur. Atqui timeam omnesque nec te.
                            </p> 
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="img-thumbnail" src="uploads/hm-about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End About Section -->

    <!-- Start Feature Section -->
    <div id="hm-feature" class="layer-stretch">
        <div class="layer-wrapper layer-bottom-10">
            <div class="layer-ttl">
                <h3>Why Choose Us</h3>
            </div>
            <div class="layer-container">
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <span>Emergency Departments</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <span>24 hour Service</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-cloud"></i>
                    </div>
                    <span>Advanced Technology</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-ambulance"></i>
                    </div>
                    <span>Ambulance</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <span>Primary health care</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <span>Pharmacies and drug stores</span>
                    <p class="paragraph-small paragraph-black">Mel in hinc veri admodum, copiosae epicurei mea ei. Cum at nisl soleat. Eam insolens referrentur efficiantur an. Nibh deleniti ad vix, quodsi aliquam legendos pri in.</p>
                </div>
            </div>
        </div>
    </div><!-- End Feature Section -->
    <!-- Start Doctor Section -->
    <div class="parallax-background parallax-background-2">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>Our Team</h3>
                </div>
                <div class="layer-container">
                    <div id="hm-doctor-slider" class="owl-carousel owl-theme theme-owl-dot">
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-1.jpg" alt="">
                            <h6>Dr. Daniel Barnes</h6>
                            <p>Orthologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-2.jpg" alt="">
                            <h6>Dr. Melisa bates</h6>
                            <p>Gynocologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-3.jpg" alt="">
                            <h6>Dr. Cheri Aria</h6>
                            <p>Dermatologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-4.jpg" alt="">
                            <h6>Steve Soeren</h6>
                            <p>Orthologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-5.jpg" alt="">
                            <h6>Barbara Baker</h6>
                            <p>Surgeon</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-6.jpg" alt="">
                            <h6>Linda Adams</h6>
                            <p>Gynocologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-7.jpg" alt="">
                            <h6>Emily Rasberry</h6>
                            <p>Pathologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="uploads/slide-doctor-8.jpg" alt="">
                            <h6>Nancy Allen</h6>
                            <p>Gynocologist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Doctor Section -->
    <!-- Start Blog Section -->
    <div id="hm-blog" class="layer-stretch">
        <div class="layer-wrapper layer-bottom-10 text-center">
            <div class="layer-ttl">
                <h3>Latest Posts</h3>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <div class="blog-card-date">08 Jun 2017</div>
                            <img src="uploads/blog-1.jpg" alt="">
                        </div>
                        <div class="blog-card-ttl">
                            <h3><a href="#">Why Food Poisoning happened and How To  – Home Remedy</a></h3>
                        </div>
                        <div class="blog-card-details">
                            <p><i class="fa fa-user"></i>Daniel Barnes</p>
                            <p><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <div class="blog-card-date">05 Jun 2017</div>
                            <img src="uploads/blog-2.jpg" alt="">
                        </div>
                        <div class="blog-card-ttl">
                            <h3><a href="#">All you need to know about Chinese Food, Is it good or bad?</a></h3>
                        </div>
                        <div class="blog-card-details">
                            <p><i class="fa fa-user"></i>Melissa Bates</p>
                            <p><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="theme-block theme-block-hover">
                        <div class="theme-block-picture">
                            <div class="blog-card-date">27 Apr 2017</div>
                            <img src="uploads/blog-3.jpg" alt="">
                        </div>
                        <div class="blog-card-ttl">
                            <h3><a href="#">Keep it Clean: Make Sure Your Fruits and Veggies Are Safe and Healthy</a></h3>
                        </div>
                        <div class="blog-card-details">
                            <p><i class="fa fa-user"></i>Micheal</p>
                            <p><a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Blog Section -->
    <!-- Start Testimonial Section -->
    <div id="testimonial" class="parallax-background parallax-background-3">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>What People Say</h3>
                </div>
                <div class="layer-container">
                    <div id="testimonial-slider" class="owl-carousel owl-theme theme-owl-dot">
                        <div class="testimonial-block">
                            <img class="img-responsive" src="uploads/testimonial-1.jpg" alt="">
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                Thank you for the remedy. I feel it has been working on a deeper subtle level. An inner seeing. I have had the feeling of a melting inside and great sense of peace and rightness. I experienced this before with your perception and treatment so thank you very much.
                            </div>
                            <a>Reuben Snow</a>
                        </div>
                        <div class="testimonial-block">
                            <img class="img-responsive" src="uploads/testimonial-2.jpg" alt="">
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                This was my second visit here I loved it first visit but love it more on my second visit. I loved thier facility and online system. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam veniam sit nemo eveniet recusandae nihil nesciunt rerum alias.
                            </div>
                            <a>Julien Cain</a>
                        </div>
                        <div class="testimonial-block">
                            <img class="img-responsive" src="uploads/testimonial-3.jpg" alt="">
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                Thank you for the remedy. I feel it has been working on a deeper subtle level. An inner seeing. I have had the feeling of a melting inside and great sense of peace and rightness. I experienced this before with your perception and treatment so thank you very much.
                            </div>
                            <a>Naum Gabo</a>
                        </div>
                        <div class="testimonial-block">
                            <img class="img-responsive" src="uploads/testimonial-4.jpg" alt="">
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias corporis ad veniam, illo expedita aut quaerat voluptatem, magni voluptas necessitatibus omnis error quia deserunt asperiores beatae fugiat quisquam magnam mollitia!
                            </div>
                            <a>Winceton Logo</a>
                        </div>
                        <div class="testimonial-block">
                            <img class="img-responsive" src="uploads/testimonial-5.jpg" alt="">
                            <div class="paragraph-medium paragraph-white">
                                <i class="fa fa-quote-left"></i>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias corporis ad veniam, illo expedita aut quaerat voluptatem, magni voluptas necessitatibus omnis error quia deserunt asperiores beatae fugiat quisquam magnam mollitia!
                            </div>
                            <a>Robert Bratheon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Testimonial Section -->
    <!-- Start Emergency Section -->
    <div id="emergency">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl">
                    <h3>On Emergency</h3>
                </div>
                <div class="layer-container">
                    <div class="paragraph-medium paragraph-black">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.
                    </div>
                    <div class="emergency-number">Call : 0000000000</div>
                </div>
            </div>
        </div>
    </div><!-- End Emergency Section -->
    <!-- Start Make an Appointment Modal -->
    <div id="appointment" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title">Make An Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="appointment-error"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-user-o"></i>
                                <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]*" id="appointment-name">
                                <label class="mdl-textfield__label" for="appointment-name">Name</label>
                                <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-envelope-o"></i>
                                <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="appointment-email">
                                <label class="mdl-textfield__label" for="appointment-email">Email</label>
                                <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-phone"></i>
                                <input class="mdl-textfield__input" type="text" pattern="[0-9]*" id="appointment-mobile">
                                <label class="mdl-textfield__label" for="appointment-mobile">Mobile Number</label>
                                <span class="mdl-textfield__error">Please Enter Valid Mobile Number!</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input-icon">
                                <i class="fa fa-hospital-o"></i>
                                <select class="mdl-selectfield__select" id="appointment-department">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Gynaecology</option>
                                    <option value="2">Orthology</option>
                                    <option value="3">Dermatologist</option>
                                    <option value="4">Anaesthesia</option>
                                    <option value="5">Ayurvedic</option>
                                </select>
                                <label class="mdl-selectfield__label" for="appointment-department">Choose Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input-icon">
                                <i class="fa fa-user-md"></i>
                                <select class="mdl-selectfield__select" id="appointment-doctor">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Dr. Daniel Barnes</option>
                                    <option value="2">Dr. Steve Soeren</option>
                                    <option value="3">Dr. Barbara Baker</option>
                                    <option value="4">Dr. Melissa Bates</option>
                                    <option value="5">Dr. Linda Adams</option>
                                </select>
                                <label class="mdl-selectfield__label" for="appointment-doctor">Choose Doctor</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                                <i class="fa fa-calendar-o"></i>
                                <input class="mdl-textfield__input" type="text" id="appointment-date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                <label class="mdl-textfield__label" for="appointment-date">Date</label>
                                <span class="mdl-textfield__error">Please Enter Valid Date Number!</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-4">
                        <button class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect mdl-button--raised button button-primary button-lg make-appointment">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Make an Appointment Modal -->
    <!-- Start Login Modal -->
    <div id="loginpopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title">Login Now</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-envelope-o"></i>    
                        <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="loginpopup-email">
                        <label class="mdl-textfield__label" for="loginpopup-email">Email <em> *</em></label>
                        <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-key"></i>
                        <input class="mdl-textfield__input" type="password" id="loginpopup-password">
                        <label class="mdl-textfield__label" for="loginpopup-password">Password <em> *</em></label>
                        <span class="mdl-textfield__error">Please Enter Valid Password!</span>
                        <div class="forgot-pass">Forgot Password?</div>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon form-bot-check">
                        <i class="fa fa-question"></i>
                        <input class="mdl-textfield__input" type="number" id="loginpopup-bot">
                        <label class="mdl-textfield__label" for="loginpopup-bot">What is 7 plus 1 = <em>* </em></label>
                        <span class="mdl-textfield__error">Please Enter Correct Value!</span>
                    </div>
                    <div class="form-submit">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Login Now</button>
                    </div>
                    <div class="or-using">Or Using</div>
                    <div class="social-login">
                        <a href="#" class="social-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                        <a href="#" class="social-google"><i class="fa fa-google"></i>Google</a>
                    </div>
                    <div class="login-link">
                        <span class="paragraph-small">Don't have an account?</span>
                        <a href="#" class="">Register as New User</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Login Modal -->
    <!-- Start Register Modal -->
    <div id="registerpopup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title">Register as New User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-user-o"></i>
                        <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z, ]*" id="registerpopup-name">
                        <label class="mdl-textfield__label" for="registerpopup-name">Name <em> *</em></label>
                        <span class="mdl-textfield__error">Please Enter Valid Name!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-envelope-o"></i>
                        <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="registerpopup-email">
                        <label class="mdl-textfield__label" for="registerpopup-email">Email <em> *</em></label>
                        <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                        <i class="fa fa-key"></i>
                        <input class="mdl-textfield__input" type="password" id="registerpopup-password">
                        <label class="mdl-textfield__label" for="registerpopup-password">Password <em> *</em></label>
                        <span class="mdl-textfield__error">Please Enter Valid Password(Min 6 Character)!</span>
                    </div>
                    <div class="login-condition">By clicking Creat Account you agree to our <a href="#">terms &#38; condition</a></div>
                    <div class="form-submit">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Create Account</button>
                    </div>
                    <div class="or-using">Or Using</div>
                    <div class="social-login">
                        <a href="#" class="social-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                        <a href="#" class="social-google"><i class="fa fa-google"></i>Google</a>
                    </div>
                    <div class="login-link">
                        <span class="paragraph-small">Already have an account?</span>
                        <a href="#" class="">Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Register Modal -->
    <!-- Fixed Appointment Button at Bottom -->
    <div id="appointment-button" class="animated fadeInUp">
        <button id="appointment-now" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-button--raised"><i class="fa fa-plus"></i></button>
        <div class="mdl-tooltip mdl-tooltip--top" data-mdl-for="appointment-now">Make An Appointment</div>
    </div><!-- End Fixed Appointment Button at Bottom -->
    <!-- Start Footer Section -->
    <footer id="footer">
        <div class="layer-stretch">
            <!-- Start main Footer Section -->
            <div class="row layer-wrapper">
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Basic Info</p></div>
                    <div class="footer-container footer-a">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-map-marker"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">
                                        Your office, Building Name<br />
                                        Street name, Area<br />
                                        City, Country Pin Code
                                    </p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">11122333333</p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">hello@yourdomain.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Quick Links</p></div>
                    <div class="footer-container footer-b">
                        <div class="tbl">
                            <div class="tbl-row">
                                <ul class="tbl-cell">
                                    <li><a href="event-1.html">Event Style 1</a></li>
                                    <li><a href="event-2.html">Event Style 2</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="privacy-policy.html">Privacy policy</a></li>
                                    <li><a href="terms-conditions.html">Terms condition</a></li>
                                    <li><a href="faq.html">Faq</a></li>
                                </ul>
                                <ul class="tbl-cell">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="forgot.html">Forgot Password</a></li>
                                    <li><a href="myappointment.html">My Appointment</a></li>
                                    <li><a href="myrequest.html">My Request</a></li>
                                    <li><a href="myprofile.html">My Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Newsletter</p></div>
                    <div class="footer-container footer-c">
                        <div class="footer-subscribe">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="subscribe-email">
                                <label class="mdl-textfield__label" for="subscribe-email">Your Email</label>
                                <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                            </div>
                            <div class="footer-subscribe-button">
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Submit</button>
                            </div>
                        </div>
                        <ul class="social-list social-list-colored footer-social">
                            <li>
                                <a href="#" target="_blank" id="footer-facebook" class="fa fa-facebook"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-twitter" class="fa fa-twitter"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-twitter">Twitter</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-google" class="fa fa-google"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-google">Google</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-instagram" class="fa fa-instagram"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-instagram">Instagram</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-youtube" class="fa fa-youtube"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-youtube">Youtube</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-linkedin" class="fa fa-linkedin"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-linkedin">Linkedin</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-flickr" class="fa fa-flickr"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-flickr">Flickr</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-rss" class="fa fa-rss"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-rss">Rss</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End main Footer Section -->
        <!-- Start Copyright Section -->
        <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white">2017 © Pepdev ALL RIGHTS RESERVED.</div>
            </div>
        </div><!-- End of Copyright Section -->
    </footer><!-- End of Footer Section -->

    <!-- **********Included Scripts*********** -->

    <!-- Jquery Library 2.1 JavaScript-->
    <script src="plantilla/js/jquery-2.1.4.min.js"></script>
    <!-- Popper JavaScript-->
    <script src="plantilla/js/popper.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="plantilla/js/bootstrap.min.js"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="plantilla/js/material.min.js"></script>
    <!-- Material Select Field Script -->
    <script src="plantilla/js/mdl-selectfield.min.js"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="plantilla/js/jquery.flexslider.min.js"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="plantilla/js/owl.carousel.min.js"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="plantilla/js/jquery-scrolltofixed.min.js"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="plantilla/js/jquery.magnific-popup.min.js"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="plantilla/js/jquery.waypoints.min.js"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="plantilla/js/jquery.counterup.js"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="plantilla/js/smoothscroll.min.js"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="plantilla/js/custom.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-93901876-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>