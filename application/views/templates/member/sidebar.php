<!-- Sidebar -->
<?php
if (
    $this->session->userdata('role') != "donatur"
) {
    redirect('/notFound');
}

?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('member/home') ?>">
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
        <a class="nav-link pb-0" href="<?= base_url('member/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('profile') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>

    <li class="nav-item <?= activate_menu('profile/edit') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/profile/edit') ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profil</span></a>
    </li>

    <li class="nav-item <?= activate_menu('Change_Password') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/Change_Password') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Donasi
    </div>


    <!-- Nav Item - Dashboard -->

    <li class="nav-item <?= activate_menu('riwayat_donasi') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/riwayat_donasi') ?>">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Riwayat Donasi Transfer</span></a>
    </li>

    <li class="nav-item <?= activate_menu('riwayat_donasi_tunai') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/riwayat_donasi_tunai') ?>">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Riwayat Donasi Tunai</span></a>
    </li>

    <li class="nav-item <?= activate_menu('donasi') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/donasi') ?>">
            <i class="fas fa-fw fa-hand-holding-heart"></i>
            <span> Tambah Donasi</span></a>
    </li>

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