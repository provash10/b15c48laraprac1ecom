<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/admin/dashboard')}}" class="d-block">CEO</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              

              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Categories
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    {{-- <a href="./index.html" class="nav-link"> --}}
                      <a href="{{url('/admin/category/list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>

                  {{-- for update --}}

                  <li class="nav-item">
                    {{-- <a href="./index.html" class="nav-link"> --}}
                      <a href="{{url('/admin/category/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                </ul>
              </li>


              {{-- for logout --}}
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Credentials
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    {{-- <a href="./index.html" class="nav-link"> --}}
                      <a href="{{url('/admin/logout')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Logout</p>
                    </a>
                  </li>

                  {{-- for update --}}

                  <li class="nav-item">
                    {{-- <a href="./index.html" class="nav-link"> --}}
                      <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Update Credentials</p>
                    </a>
                  </li>
                </ul>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>