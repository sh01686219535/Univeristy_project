@include('backend.include.style')
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.include.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('backend.include.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('backend.include.script')