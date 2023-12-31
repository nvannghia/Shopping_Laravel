<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Shopping</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
        <div class="info">
          <a href="{{ route('logout') }}" class="d-block text-danger">Logout</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('list-category')
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Category
                </p>
              </a>
            </li>
          @endcan

          @can('list-menu')
            <li class="nav-item">
              <a href="{{ route('menus.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                  Menu
                </p>
              </a>
            </li>
          @endcan
          

          @can('list-product')
            <li class="nav-item">
              <a href="{{ route('products.index') }}" class="nav-link">
                <i class="nav-icon fa-brands fa-product-hunt"></i>
                <p>
                  Product
                </p>
              </a>
            </li>
          @endcan

          @can('list-slider')
            <li class="nav-item">
              <a href="{{ route('slider.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-sliders"></i>
                <p>
                  Slider
                </p>
              </a>
            </li>
          @endcan

          @can('list-setting')
            <li class="nav-item">
              <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-gears"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>
          @endcan

          @can('list-user')
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link">
                <i class="nav-icon fa-regular fa-circle-user"></i>
                <p>
                  Users list
                </p>
              </a>
            </li>
          @endcan
          
          @can('list-role')
            <li class="nav-item">
              <a href="{{ route('role.index') }}" class="nav-link">
                <i class="nav-icon fa-brands fa-critical-role"></i>
                <p>
                  Roles list
                </p>
              </a>
            </li>
          @endcan

          @can('add-permission')
            <li class="nav-item">
              <a href="{{ route('permission.create') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-layer-group"></i>
                <p>
                  Create permission
                </p>
              </a>
            </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>