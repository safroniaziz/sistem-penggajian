<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg ')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Session::get('nama') }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header bg-red" style="text-align: center;">MENU UTAMA</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ set_active('admin.dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="{{ set_active('admin.pegawai') }}"><a href="{{ route('admin.pegawai') }}"><i class="fa fa-users"></i> <span>Manajemen Pegawai</span></a></li>
        <li class="{{ set_active('admin.jabatan') }}"><a href="{{ route('admin.jabatan') }}"><i class="fa fa-link"></i> <span>Manajemen Jabatan</span></a></li>
        <li class="{{ set_active('admin.laporan') }}"><a href="{{ route('admin.laporan') }}"><i class="fa fa-bar-chart"></i> <span>Laporan Gaji Pegawai</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>