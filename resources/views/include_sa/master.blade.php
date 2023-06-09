
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend_sa')}}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('frontend_sa')}}/img/favicon.png">
  <title>
    {{$setting->site_title}}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('frontend_sa/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend_sa')}}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('frontend_sa')}}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('frontend_sa')}}/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
<!-- Bootstrap Icons CSS -->


</head>


        <!-- Navbar -->
        @include('include_sa._header')
        <!-- End Navbar -->

<!-- main content area start -->

        @yield('content')

<!-- main content area end -->


  <!-- -------- START FOOTER ------- -->

  <!-- -------- END FOOTER  ------- -->

  <!--   Core JS Files   -->
  <script src="{{asset('frontend_sa')}}/js/core/popper.min.js"></script>
  <script src="{{asset('frontend_sa')}}/js/core/bootstrap.min.js"></script>
  <script src="{{asset('frontend_sa')}}/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{asset('frontend_sa')}}/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script src="{{asset('frontend_sa')}}/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
