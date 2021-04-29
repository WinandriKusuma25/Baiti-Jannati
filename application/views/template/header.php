<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Mobile Application HTML5 Template">

    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/user/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/maicons.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/vendor/animate/animate.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/vendor/owl-carousel/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/user/css/mobster.css">

    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>


<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('beranda') ?>">
            <img src="<?= base_url(); ?>assets/user/logo.png" alt="" width="70">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                <li class="nav-item <?= activate_menu('beranda') ?>">
                    <a class="nav-link" href="<?= base_url('beranda') ?>">Beranda</a>
                </li>
                <li class="nav-item <?= activate_menu('profile') ?>">
                    <a class="nav-link" href="<?= base_url('profile') ?>">Profil</a>
                </li>
                <li class="nav-item <?= activate_menu('berita') ?>">
                    <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                </li>
                <li class="nav-item <?= activate_menu('anak_didik') ?>">
                    <a class="nav-link" href="<?= base_url('anak_didik') ?>">Anak Didik</a>
                </li>
                <li class="nav-item <?= activate_menu('laporan') ?>">
                    <a class="nav-link" href="<?= base_url('laporan') ?>">Laporan</a>
                </li>
                <li class="nav-item <?= activate_menu('kontak') ?>">
                    <a class="nav-link" href="<?= base_url('kontak') ?>">Kontak</a>
                </li>
                <li class="nav-item <?= activate_menu('Auth') ?>">
                    <a class="nav-link" href="<?= base_url('Auth/registration') ?>">Registrasi</a>
                </li>




            </ul>
            <div class="ml-auto my-2 my-lg-0">
                <a href="<?= base_url('auth'); ?>" class="btn btn-primary rounded-pill">Login</a>
            </div>

        </div>
    </div>
</nav>