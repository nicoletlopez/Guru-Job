<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Guru App @yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/material-kit.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fonts/themify-icons.css')}}">

    <link rel="stylesheet" href="{{asset('css/color-switcher.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('extras/animate.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('extras/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('extras/owl.theme.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('extras/settings.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('vendor/dropzone/dist/min/dropzone.min.css')}}" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/colors/red.css')}}" media="screen"/>
</head>
<body>

<div class="header">

        @include('inc.navbar')
    <section id="intro-bg">
        @yield('searchbar')
    </section>
</div>


@yield('content')

<footer>
   <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" href="http://graygrids.com">GrayGrids</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<a href="#" class="back-to-top">
    <i class="ti-arrow-up"></i>
</a>
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
            <div class="object" id="object_five"></div>
            <div class="object" id="object_six"></div>
            <div class="object" id="object_seven"></div>
            <div class="object" id="object_eight"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/jquery-min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/material.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/material-kit.js')}}"></script>
<!--<script type="text/javascript" src="{{asset('js/color-switcher.js')}}"></script>-->
<script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.slicknav.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/form-validator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/contact-form-script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
<script type="text/javascript" src="{{asset('self/js/countries.js')}}"></script>
<script type="text/javascript" src="{{asset('self/js/custom.js')}}"></script>
<script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor0' );
    CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>