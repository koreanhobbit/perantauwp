<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="gerbang pertama menuju korea">
  <meta name="author" content="Perantau Indonesia">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Perantau Indonesia</title>

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('frontend/medicio/css/medicio_app.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/medicio/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/medicio/css/style.css') }}">

  {{-- icon tab --}}
  <link rel="icon" href="{{ !empty($setting->iconImage()) ? asset($setting->iconImage()->location) : asset('images/astrologo.png') }}">
 
  <!-- boxed bg -->
  <link id="bodybg" href="{{ !empty($setting->themeBackground) ? asset($setting->themeBackground->location) : asset('frontend/medicio/bodybg/bg5.css') }}" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="{{ !empty($setting->themeColor) ? asset($setting->themeColor->location) : asset('frontend/medicio/color/blue.css') }}" rel="stylesheet" type="text/css" />

  @yield('style')
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div id="wrapper">
    @yield('body')
  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="{{ asset('frontend/medicio/js/app.js') }}"></script>
  <script src="{{ asset('frontend/medicio/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('frontend/medicio/js/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/medicio/js/jquery.scrollTo.js') }}"></script>
  <script src="{{ asset('frontend/medicio/js/owl.carousel.js') }}"></script>
  <script src="{{ asset('frontend/medicio/js/custom.js') }}"></script>
  @yield('script')
  @include('frontend.messenger.tawkto')
</body>

</html>