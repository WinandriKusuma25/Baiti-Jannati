<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"> Beranda &nbsp; / &nbsp; <a
                    href="<?php echo base_url("member/home"); ?>">Dashboard</a>
            </div>
        </small>
    </div>

    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Selamat Datang
            <?php foreach ($user as $usr) : ?>
            <?= $usr->name ?>
            <?php endforeach ?>
            di halaman donatur Baiti Jannati
        </h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
            so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>

</div>
</div>