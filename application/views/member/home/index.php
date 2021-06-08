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


    <div class="row  justify-content-center">
        <div class="col">

            <!-- Illustrations -->
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/background.svg" alt="">


                    </div>
                    Selamat Datang
                    <?php foreach ($user as $usr) : ?>
                    <?= $usr->name ?>
                    <?php endforeach ?>
                    di halaman donatur Baiti Jannati

                    </h4>
                    Halaman Profil terdapat <b>Edit Profil</b> dan <b>Ubah password</b> sebagai identitas Anda.
                    Halaman <b>Riwayat Donasi</b> untuk mengetahui riwayat donasi Anda yang terdiri dari Riwayat
                    <b>Tunai dan Transfer</b>
                    <br>
                    Berikut Daftar No. Rekening di Baiti Jannati
                    <?php ;
                     foreach ($bank as $j) : ?>

                    <?= $j->nama_bank ?>
                    <?= $j->no_rekening ?>
                    <?php endforeach ?>
                    <hr>
                    Halaman Tambah Donasi untuk menambahkan donasi.
                    Donasi Anda sangat berharga bagi kami.
                </div>
            </div>
        </div>





    </div>

</div>
</div>