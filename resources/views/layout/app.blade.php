<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{!empty($header_title) ? $header_title : ''}} - IMS</title>
  <link rel="icon" href="{{url('public/assets/dist/img/logo.png')}}" type="image/x-icon">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{url('public/assets/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{url('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/plugins/jqvmap/jqvmap.min.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/plugins/daterangepicker/daterangepicker.css')}}">

  <link rel="stylesheet" href="{{url('public/assets/plugins/summernote/summernote-bs4.min.css')}}">

  @yield('style')
  <style>
  body {
    background-image: url('{{ asset('public/assets/dist/img/10135315_18129294.jpg') }}'); 
    background-size: cover;
    background-position: center; 
    background-repeat: no-repeat; 
    min-height: 100vh; 
  }

  
  .content-wrapper {
    background-color: rgba(255, 255, 255, 0.1); 
    padding: 20px;
    border-radius: 10px;
    
  }
</style>

<style>

  .main-sidebar {
    background-color:rgb(80, 0, 115); 
  }


  .main-sidebar .nav-link {
    color: #ecf0f1; 
  }


  .main-sidebar .nav-link:hover {
    background-color: #AD49E1; 
    color: #ffffff; 
  }


  .brand-link {
    background-color: rgb(80, 0, 115);  
    color: #ffffff;
  }

 
  .main-sidebar .nav-icon {
    color: #EBD3F8; 
  }


  .main-sidebar .nav-pills .nav-link.active {
    background-color: #27ae60;
    color: #ffffff; 
  }


  .main-header {
    background-color:#EBD3F8; 
  }
</style>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{url('public/assets/dist/img/logo.png')}}" alt="AdminLTELogo" height="80" width="80">
  </div>

    @include('layout.header')

    @yield('content')

    @include('layout.footer')


</div>



<script src="{{url('public/assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{url('public/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{url('public/assets/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{url('public/assets/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{url('public/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<script src="{{url('public/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{url('public/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('public/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{url('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{url('public/assets/dist/js/adminlte.js')}}"></script>

<script src="{{url('public/assets/dist/js/demo.js')}}"></script>

<script src="{{url('public/assets/dist/js/pages/dashboard.js')}}"></script>

@yield('script')
</body>
</html>
