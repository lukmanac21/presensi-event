 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/images/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <nav class="mt-2>">
          <li class="nav-item">
            <br>
            <a style="margin-left : 20px ;" class="nav_link" href="<?php echo site_url('login/logout'); ?>"><span>Logout</a>
          </li>
        </nav>
      </ul>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Jurusan/index')?>" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Ruangan/index')?>" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Ruang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Kategori/index')?>" class="nav-link">
                  <i class="nav-icon fas fa-share-alt"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-male"></i>
                  <p>Pemateri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Slider/index')?>" class="nav-link">
                  <i class="nav-icon fas fa-image"></i>
                  <p>Slider</p>
                </a>
              </li>
              <hr style="border-top: 1px solid white ;">
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/Event/index')?>" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Absensi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>