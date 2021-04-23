<!-- Sidebar -->
<?php
if (
    $this->session->userdata('role') != "admin"
) {
    redirect('/notFound');
}

?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('superadmin/home') ?>">
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
        <a class="nav-link pb-0" href="<?= base_url('superadmin/home') ?>">
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
        <a class="nav-link pb-0" href=" <?= base_url('superadmin/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>

    <li class="nav-item <?= activate_menu('profile/edit') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('superadmin/profile/edit') ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profil</span></a>
    </li>

    <li class="nav-item <?= activate_menu('Change_Password') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('superadmin/Change_Password') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Pengguna
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('users') ?>">
        <a class="nav-link pb-0" href="<?= base_url('superadmin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Donatur</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('pengurus') ?>">
        <a class="nav-link pb-0" href="<?= base_url('superadmin/pengurus') ?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Pengurus</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan Profile
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('anak_didik') ?>">
        <a class="nav-link pb-0" href="<?= base_url('superadmin/anak_didik') ?>">
            <i class="fas fa-fw fa-child"></i>
            <span>Anak Didik</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('berita') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('superadmin/berita') ?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita Kegiatan</span></a>
    </li>



    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('pengaturan') ?>">
        <a class="nav-link pb-0" href="<?= base_url('superadmin/pengaturan') ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Pengaturan</span></a>
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