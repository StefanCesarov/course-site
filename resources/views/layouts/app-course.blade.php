<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>SCE Kursevi programiranja</title>
    <meta name="description" content="Video kursevi programiranja! Postani programerer, lako i jednostavno.">

        <!--   open graph -->
    <meta property="og:title" content="SCE Kursevi programiranja">
    <meta property="og:description" content="Mesto gde se postaje programer. Online kursevi programiranja. Savladaj potrebne vestine uz nase video tutorijale.">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favIconSCE.png') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
             
                    <span>sce.kursevi@gmail.com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>064-349-31-36</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                  @auth
                    @if(auth()->user()->isAdmin())
                      <a href="{{ route('users-index') }}">Korisnici</a>
                    @endif
                  @endauth
                   <ul class="mu-top-social-nav">

                  @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">
                                    <button><i class="fa fa-user"></i> {{ __(' Login') }}</button></a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <button><i class="fa fa-user"></i>{{ __(' Logout') }}</button>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                    </a>
                                </li>
                  @endguest
                  <!--   <ul class="mu-top-social-nav">

                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    -->
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="{{ route('kurs.index') }}"><i class="fa fa"><b style="font-family: 'Impact';font-style: italic;text-decoration: underline;">SCE</b></i><span> COURSES</span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
          <li class="{{ request()->is('besplatan-materijal') ? 'active' : '' }}"><a href="{{ route('besplatan.materijal') }}">Besplatan sadržaj</a></li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('kurs.index') }}">Home</a></li>
            <li class="{{ request()->is('backend') ? 'active' : '' }}"><a href="{{ route('backend-courses') }}">Backend</a></li>
            <li class="{{ request()->is('frontend') ? 'active' : '' }}"><a href="{{ route('frontend-courses') }}">Front-End</a></li>
            <li class="{{ request()->is('fullstack') ? 'active' : '' }}"><a href="{{ route('fullstack-courses') }}">Fullstack</a></li>                     
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                  @foreach($languages as $language)
                <li><a href="{{ route('course-language', $language->slug) }}">{{ $language->name }}</a></li>  
                    @endforeach              
              </ul>
            </li>           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Framework <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
              @foreach($frameworks as $framework)
                <li><a href="{{ route('course-framework', $framework->name) }}">{{ $framework->name }}</a></li>  
              @endforeach  
              </ul>
            </li>            
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->

  @yield('content')
  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
              <h4>Information</h4>
                <ul>
                 <li><a href="/">Courses</a></li>
                  <!--dodato review -->
                  <li><a href="{{ route('utisci') }}">Write a Review</a></li>
            <!--dodato review -->
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <ul>
                  <li><p>Telefon: 064-349-31-36</p></li>
                  <li><p>Email:  info@sce-kursevi.com</p></li>
                  <li><a href="https://www.instagram.com/scekursevi/" target="_blank">Instagram</a></li>
                  <li><a href="https://www.facebook.com/Kursevi-programiranja-111163161364635" target="_blank">Facebook</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
              <h4>Useful sites</h4>
                <ul>
                  <li><a href="https://stackoverflow.com/" target="_blank">stackoverflow.com</a></li>
                  <li><a href="https://www.w3schools.com/" target="_blank">w3schools.com</a></li>
                  <li><a href="https://coddyschool.com/upload/Addison_Wesley_The_Object_Orient.pdf" target="_blank">Objektno orijentisano programiranje</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
              <h4>Zaposli se u IT sektoru</h4>
                <ul>
                  <li><a href="https://www.helloworld.rs/" target="_blank">helloworld.rs</a></li>
                  <li><a href="https://www.joberty.rs/" target="_blank">joberty.rs</a></li>
                  <li><a href="https://startit.rs/" target="_blank">startit.rs</a></li>
                </ul>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a>SCE</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{ asset('js/waypoints.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.counterup.js') }}"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="{{ asset('js/jquery.mixitup.js') }}"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
  
  
  <!-- Custom js -->
  <script src="{{ asset('js/custom.js') }}"></script> 

  </body>
</html>