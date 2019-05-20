
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Bingo One page parallax responsive HTML Template ">

  <meta name="author" content="Themefisher.com">

  <title>AMMEX | ADMINISTRACION DE PROYECTOS</title>

<!-- Mobile Specific Meta
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('bingo/img/favicon.png')}}" />

  <!-- CSS
  ================================================== -->
  <!-- RS5.0 Main Stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/settings.css')}}">
  <!-- RS5.0 Layers and Navigation Styles -->
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/layers.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/navigation.css')}}">
  <!-- REVOLUTION STYLE SHEETS -->
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/fonts/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/settings.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/layers.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/plugins/revo-slider/css/navigation.css')}}">
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset('bingo/plugins/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('bingo/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="{{asset('bingo/plugins/lightbox2/dist/css/lightbox.min.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('bingo/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('bingo/plugins/slick-carousel/slick/slick-theme.css')}}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('bingo/css/style.css')}}">


  <!-- Colors -->
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/green.css')}}" title="green">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/red.css')}}" title="light-red">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/blue.css')}}" title="blue">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/light-blue.css')}}" title="light-blue">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/yellow.css')}}" title="yellow">
  <link rel="stylesheet" type="text/css" href="{{asset('bingo/css/colors/light-green.css')}}" title="light-green">


</head>

<body id="body">

 <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class='preloader'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!--
  End Preloader
  ==================================== -->




<!--
  Fixed Navigation
  ==================================== -->
  <header class="navigation navbar navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <!-- responsive nav button -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- /responsive nav button -->

        <!-- logo -->
        <a class="navbar-brand logo" href="index.html">
          <img class="logo-default" src="{{asset('logos/ammex_logo.png')}}" alt="logo" />
          <img class="logo-white" src="{{asset('logos/ammex_logo_white.png')}}" alt="logo" />
        </a>
        <!-- /logo -->
      </div>

      <!-- main nav -->
      <nav class="collapse navbar-collapse navbar-right" >
        <ul id="nav" class="nav navbar-nav menu">
            <li class="current"><a data-scroll href="#body">Inicio</a></li>
            <li><a data-scroll href="#about">Sobre nosotros</a></li>
            <li><a data-scroll href="#services">Servicios</a></li>
            <li><a data-scroll href="#team">El Equipo</a></li>
            <li><a data-scroll href="#portfolio">Portafolio</a></li>
            <li><a data-scroll href="#pricing">Precios</a></li>
            <li><a data-scroll href="{{url('login')}}">Iniciar Sesión</a></li>
        </ul>
    </nav>
      <!-- /main nav -->

    </div>
  </header>
  <!--
  End Fixed Navigation
  ==================================== -->




	 <!--
Welcome Slider
==================================== -->

<section class="hero-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h1 class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s" >Tus Proyectos <br> Nuestros objetivos</h1>
					<p class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">Trabajamos día con día para servir con eficiencia y honestidad. Lider en el mercado de proyectos de servicio.</p>
					<ul class="list-inline wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".7s">
						<li>
							<a data-scroll href="#services" class="btn btn-main">Portafolio</a>
						</li>
						<li>
							<a data-scroll href="#team" class="btn btn-transparent">Conocer más</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

	<footer id="footer" class="bg-one">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3">
          <h3>about</h3>
          <p>Integer posuere erat a ante venenati dapibus posuere velit aliquet. Fusce dapibus, tellus cursus commodo, tortor mauris sed posuere.</p>
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-sm-3 col-md-3 col-lg-3">
          <ul>
            <li><h3>Our Services</h3></li>
            <li><a href="#">Graphic Design</a></li>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-sm-3 col-md-3 col-lg-3">
          <ul>
            <li><h3>Quick Links</h3></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">FAQ’s</a></li>
            <li><a href="#">Badges</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->

        <div class="col-sm-3 col-md-3 col-lg-3">
          <ul>
            <li><h3>Connect with us Socially</h3></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Youtube</a></li>
            <li><a href="#">Pinterest</a></li>
          </ul>
        </div>
        <!-- End of .col-sm-3 -->

      </div>
    </div> <!-- end container -->
  </div>
  <div class="footer-bottom">
    <h5>Copyright 2019. Todos los derechos reservados.</h5>
    <h6>Diseñado y Desarrollado por <a href="http://moisesaguilarweb.com">VeritasSoftware</a></h6>
  </div>
</footer> <!-- end footer -->


    <!-- end Footer Area
    ========================================== -->


    <!--
    Essential Scripts
    =====================================-->
    <!-- Main jQuery -->
    <script src="{{asset('bingo/plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Google Map -->
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script  src="{{asset('bingo/plugins/google-map/gmap.js')}}"></script>
    <!-- Bootstrap 3.7 -->
    <script src="{{asset('bingo/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Parallax -->
    <script src="{{asset('bingo/plugins/parallax/jquery.parallax-1.1.3.js')}}"></script>
    <!-- lightbox -->
    <script src="{{asset('bingo/plugins/lightbox2/dist/js/lightbox.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('bingo/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <!-- Portfolio Filtering -->
    <script src="{{asset('bingo/plugins/mixitup/dist/mixitup.min.js')}}"></script>
    <!-- Smooth Scroll js -->
    <script src="{{asset('bingo/plugins/smooth-scroll/dist/js/smooth-scroll.min.js')}}"></script>

    <!-- Custom js -->
    <script src="{{asset('bingo/js/script.js')}}"></script>

  </body>
  </html>
