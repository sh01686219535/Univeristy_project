  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-th-large"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <h3 class="font-weight-bold pt-3 pb-2 text-center ">
                    @php
                        $user = Auth::guard('user')->name;
                    @endphp 
                    {{$user}}
                  </h3>
                  <div class="dropdown-divider"></div>
                  {{-- <a href="#">
                      <p class="py-2 text-center">Profile</p>
                  </a> --}}
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('user.logout') }}" class="dropdown-item dropdown-footer"><b>Logout</b></a>
              </div>
          </li>
      </ul>
  </nav>
