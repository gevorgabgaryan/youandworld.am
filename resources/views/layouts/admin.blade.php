<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Younadworld.am</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/flexslider.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset("numerus") }}/css/style.css">

    <!-- Modernizr JS -->
        <!-- jQuery -->
    <script src="{{ asset("numerus") }}/js/jquery.min.js"></script>
    <script src="{{ asset("numerus") }}/js/modernizr-2.6.2.min.js"></script>
      <script src="{{ asset("numerus") }}/js/myscripts.js"></script>
      
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        
    <div class="colorlib-loader"></div>

    <div id="page">
   <!--  nav -->
   @yield("navigation")
   <!--   slider -->
   @yield("slider")

 @if(count($errors)>0)
<ol style="position: fixed; z-index: 500" class="bg-danger list-inline">
     @foreach ($errors->all() as $error)

    <li class=" ml-5">{{ $error }}</li>
    @endforeach
</ol>  
  
  @endif
   @if(session('status'))
  {{ session('status') }}
  @endif
    @if(session('error'))
  {{ session('error') }}
  @endif
 @yield('content')
    @yield('footer')
      
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>
    

    <!-- jQuery Easing -->
    <script src="{{ asset("numerus") }}/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("numerus") }}/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="{{ asset("numerus") }}/js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="{{ asset("numerus") }}/js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="{{ asset("numerus") }}/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset("numerus") }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset("numerus") }}/js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="{{ asset("numerus") }}/js/main.js"></script>


    </body>
</html>

