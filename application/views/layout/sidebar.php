    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kasir <sup>Oke</sup></div>
      </a>

      <?php 
        if($this->session->userdata('level')=="admin"){ ?>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('beranda') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li> 

      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('barang') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Barang</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('users') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('laporan') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Laporan</span></a>
      </li>
      <?php  }
       ?>
       
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('transaksi') ?>">
          <i class="fa fa-credit-card"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">