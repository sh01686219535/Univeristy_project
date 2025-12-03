@include('user.include.style')
<div class="wrapper">

  <!-- Navbar -->
  @include('user.include.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('user.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('user.include.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('user.include.script')