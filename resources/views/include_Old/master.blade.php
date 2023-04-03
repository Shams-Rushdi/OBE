<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$setting->site_title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend')}}/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/metisMenu.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/slicknav.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/typography.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/default-css.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/styles.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('frontend')}}/js/vendor/modernizr-2.8.3.min.js"></script>





</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('include._sidebar')
        <!-- sidebar menu area end -->

        <div class="main-content">
            <!-- header area start -->
            @include('include._header')
            <!-- header area end -->
            <!-- page title area start -->
            @include('include._pagetitle')
            <!-- page title area end -->



        <!-- main content area start -->

        @yield('content')

        <!-- main content area end -->









        <!-- footer area start-->
        @include('include._footer')
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    @include('include._setting')
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{asset('frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('frontend')}}/js/popper.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/metisMenu.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.slimscroll.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="{{asset('frontend')}}/js/plugins.js"></script>
    <script src="{{asset('frontend')}}/js/scripts.js"></script>

</body>

</html>
