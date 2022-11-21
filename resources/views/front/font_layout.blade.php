<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Flipmart premium HTML5 & CSS3 Template</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('front/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('front.front_include.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content');
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('front.front_include.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('front/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('front/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('front/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('front/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('front/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('front/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('front/assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>  
</body>
</html>