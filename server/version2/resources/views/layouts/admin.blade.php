<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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
        <!-- Small boxes (Stat box) -->
        @include('layouts.admin_content_statbox')
        
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

<!-- jQuery -->
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

</body>
</html>
