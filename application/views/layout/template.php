<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Barang Antik - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('/') ?>" class="nav-link">Home</a>
      </li>
    </ul>
  
    <!-- Tambahkan ini agar di pojok kanan -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-user"></i>
          <?= $this->session->userdata('nama'); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="<?= site_url('profile'); ?>"><i class="fas fa-user-circle"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url('dashboard') ?>" class="brand-link">
      <i class="fas fa-cube brand-image" style="opacity: .8"></i>
      <span class="brand-text font-weight-light">Barang Antik</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="<?= site_url('dashboard') ?>" class="nav-link <?= (uri_string() == 'dashboard' || uri_string() == '') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('barangantik') ?>" class="nav-link <?= (uri_string() == 'barangantik') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-boxes"></i>
              <p>Data Barang Antik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('jenisbarang') ?>" class="nav-link <?= (uri_string() == 'jenisbarang') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th-list"></i>
              <p>Jenis Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('pemilik') ?>" class="nav-link <?= (uri_string() == 'pemilik') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Pemilik</p>
            </a>
          </li>
          <!-- Tambahkan menu Profile di sidebar -->
          <li class="nav-item">
            <a href="<?= site_url('profile') ?>" class="nav-link <?= (uri_string() == 'profile') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Profil</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.main-sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-3" style="min-height:90vh;">
    <section class="content">
      <?= isset($content) ? $content : ''; ?>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer small text-center">
    <strong>&copy; <?= date('Y') ?> Barang Antik CRUD</strong> | Powered by CodeIgniter 3 & AdminLTE
  </footer>
</div>
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
