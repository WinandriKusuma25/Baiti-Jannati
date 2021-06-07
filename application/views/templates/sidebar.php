<!-- Sidebar -->
<?php
// var_dump($this->session->userdata('data'));
// // $ses = $this->session->userdata('data');
// // echo $ses['id_role'];
// die();
if (
    $this->session->userdata('role') != "pengurus"
) {
    redirect('/notFound');
}
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/home') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>assets/images/logo.png" alt="" width="60%">
        </div>
        <div class="sidebar-brand-text mx-3">Baiti Jannati</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Beranda
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('home') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('profile') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen donasi
    </div>

    <li class="nav-item <?= activate_menu('transaksi_tunai') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/transaksi_tunai') ?>">
            <!-- <i class="fas fa-fw fa-balance-scale"></i> -->
            <i class="fas fa-fw fa-hand-holding-heart"></i>
            <span>Pemasukan Transaksi Donasi Tunai</span>
        </a>
    </li>

    <li class="nav-item <?= activate_menu('transaksi_non_tunai') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/transaksi_non_tunai') ?>">
            <i class="fas fa-fw fa-hand-holding-heart"></i>
            <span>Pemasukan Transaksi Donasi Transfer</span></a>
    </li>

    <li class="nav-item <?= activate_menu('pemasukan_non_donasi') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/pemasukan_non_donasi') ?>">
            <i class="fas fa-fw fa-hand-holding-heart"></i>
            <span>Pemasukan Non Donasi</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('pengeluaran_donasi') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/pengeluaran_donasi') ?>">
            <i class="fas fa-fw fa-funnel-dollar"></i>
            <span>Pengeluaran Keuangan</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('kategori') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/kategori') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('bank') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/bank') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Daftar Bank</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider  mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Pengguna
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('users') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Donatur</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider  mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Laporan
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('laporan') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/laporan') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan Pemasukan dan Pengeluaran Keuangan</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('laporan_pemasukan_keuangan') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/laporan_pemasukan_keuangan') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan Pemasukan Keuangan</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('laporan_pemasukan_nonkeuangan') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/laporan_pemasukan_nonkeuangan') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan Pemasukan Non Keuangan</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('laporan_pengeluaran') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/laporan_pengeluaran') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan Pengeluaran Keuangan</span></a>
    </li>







    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Logout
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link pb-1" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->