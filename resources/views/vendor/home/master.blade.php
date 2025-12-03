@include('vendor.include.style')
<div class="wrapper">

  <!-- Navbar -->
  @include('vendor.include.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('vendor.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('vendor.include.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('vendor.include.script')