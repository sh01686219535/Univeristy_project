  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('user.dashboard') }}" class="brand-link">
          <img src="{{ asset('backendAsset') }}/img/logo/dashboardLogo.png" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Bashabari</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('user.dashboard') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('user.order')}}" class="nav-link">
                          <i class="fas fa-shopping-cart nav-icon"></i>
                          <p>
                              Order
                              <i class="right fas fa-angle-right"></i>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('user.profile.index')}}" class="nav-link">
                          <i class="fas fa-user nav-icon"></i>
                          <p>
                              Profile
                              <i class="right fas fa-angle-right"></i>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
