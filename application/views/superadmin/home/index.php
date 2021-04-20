<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("member/home"); ?>">Beranda</a>
            </div>
        </small>
    </div>

    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Selamat Datang
            <?php foreach ($user as $usr) : ?>
            <?= $usr->name ?>
            <?php endforeach ?>
            di halaman SuperAdmin Baiti Jannati
    </div>



</div>
</div>