<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.admin_navigation')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin_sidebar')
  <!--/ Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.admin_content_breadcrumbs')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (request()->routeIs('dashboard'))        
          @include('layouts.admin_content_statbox')
        @endif
        <!-- /.row -->
        <!-- Main row -->        
        <div class="row">          
          @if ($errors->any())
          <div class="offset-1 col-8">
            <div class="alert alert-danger">
              <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          @if (session()->has('success'))
          <div class="offset-1 col-8">
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          </div>
          @endif
          <div class="col-12">
            @yield('content')
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> &copy; <?=date('Y')?> <a href="/">Последний звонок</a>.</strong>
    Все права защищены.
    <div class="float-right d-none d-sm-inline-block">
      <b>Версия</b> 0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>-->

<!-- jQuery -->
<script src="{{ asset('assets/admin/js/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/js/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin/js/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/js/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/admin/js/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin/js/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin/js/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!--Admin LTE-->
<script src="{{ asset('assets/admin/js/dist/adminlte.js') }}"></script>

<!--Подгружаем скрипты если они есть-->
@hasSection('scripts')
   @yield('scripts')
@endif


</body>
</html>
