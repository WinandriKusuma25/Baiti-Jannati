<!-- Sidebar -->
<?php
// var_dump($this->session->userdata('data'));
// // $ses = $this->session->userdata('data');
// // echo $ses['id_role'];
// die();
if (
    $this->session->userdata('id_role') != 1
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
    <!-- <li class="nav-item <?= activate_menu('calendar') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/calendar') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Calendar</span></a>
    </li> -->

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
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Transaksi Donasi Tunai</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('pengeluaran_donasi') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/pengeluaran_donasi') ?>">
            <i class="fas fa-fw fa-funnel-dollar"></i>
            <span>Pengeluaran Donasi</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('laporan') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/laporan') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span></a>
    </li>



    <!-- Nav Item - Utilities Collapse Menu -->
    <!--    <li
        class="nav-item  <?= activate_menu('profile') ?> <?= activate_menu('profile/edit') ?> <?= activate_menu('Change_Password') ?>">
        <a class="nav-link collapsed <?= activate_menu('profile') ?>" href="#" data-toggle="collapse"
            data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header  <?= activate_menu('profile') ?>">Profile Admin</h6>
                <a class="collapse-item <?= activate_menu('profile') ?>"
                    href=" <?= base_url('admin/profile') ?>">Profile</a>
                <a class="collapse-item <?= activate_menu('profile/edit') ?>" href="
                    <?= base_url('admin/profile/edit') ?>">Edit Profile</a>
                <a class="collapse-item <?= activate_menu('Change_Password') ?>"
                    href="<?= base_url('admin/Change_Password') ?>">Ubah Password</a>
            </div>
        </div>
    </li> -->




    <!-- Divider -->
    <hr class="sidebar-divider">
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

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('anak_didik') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/anak_didik') ?>">
            <i class="fas fa-fw fa-child"></i>
            <span>Anak Didik</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('pengurus') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/pengurus') ?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Pengurus</span></a>
    </li>

    <li class="nav-item <?= activate_menu('jabatan') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/jabatan') ?>">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Jabatan</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Berita
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('berita') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/berita') ?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita Kegiatan</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

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