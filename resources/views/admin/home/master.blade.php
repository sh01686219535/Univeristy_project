@include('admin.include.style')
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.include.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('admin.include.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.include.script')