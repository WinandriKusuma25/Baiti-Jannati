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
            di halaman donatur Baiti Jannati

        </h4>
        <p>1. Halaman Profil terdapat <b>Edit Profil</b> dan <b>Ubah password</b> sebagai identitas Anda.</p>
        <p>2. Halaman <b>Riwayat Donasi</b> untuk mengetahui riwayat donasi Anda yang terdiri dari Riwayat <b>Tunai dan
                Non Tunai</b></p>
        <p>3. Halaman <b>Tambah Donasi</b> untuk menambahkan donasi</p>
        <hr>
        <p class="mb-0">Donasi Anda sangat berharga bagi kami.</p>
    </div>



    <div class="row justify-content-center">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Berikut merupakan data donasi yang belum di bayarkan</h3>
            <hr>

        </div>

        <?php foreach ($transaksi_midtrans as $ad) : ?>

        <div class="card mr-3 mb-3 border-bottom-primary" style="width:450px; height:520px">

            <div class="text-primary">
                <h6>
                    <p class="card-text"><b>
                            <center>Data Donatur</center>
                        </b></p>
                </h6>
            </div>
            <center>
                <hr width="90%">
            </center>



            <div class="card-text">&nbsp;&nbsp; Nama :&nbsp;<b><?= $ad->name ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Email :&nbsp;<b><?= $ad->email ?></b></div>
            <center>
                <hr width="90%">
            </center>

            <div class="text-primary">
                <h6>
                    <div class="card-text"><b>
                            <center>Detail Transaksi</center>
                        </b></div>
                </h6>
            </div>

            <center>
                <hr width="90%">
            </center>


            <div class="card-text">&nbsp;&nbsp; ID Order :&nbsp;<b><?= $ad->order_id ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Nominal :&nbsp;<b> Rp.
                    <?= number_format($ad->gross_amount, 2, ',', '.'); ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Tipe Payment :&nbsp;<b><?= $ad->payment_type ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Tgl. Transaksi :&nbsp;<b><?= $ad->transaction_time ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Bank :&nbsp;<b><?= $ad->bank ?></b></div>
            <div class="card-text">&nbsp;&nbsp; Va number :&nbsp;<b><?= $ad->va_number ?></b></div>

            <?php if ($ad->status_code == "200") : ?>
            <div class="project-state">
                &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-success"> Sukses</span>
            </div>
            <?php elseif ($ad->status_code == "201") : ?>
            <div class="project-state">
                &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-warning"> Pending</span>
            </div>
            <?php else : ?>
            <div class="project-state">
                &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-danger">Gagal</span>
            </div>
            <?php endif ?>
            <div class="card-text">&nbsp;&nbsp; Keterangan :&nbsp;<b><?= $ad->keterangan ?></b></div>
            <p>
                <center><a href="<?= $ad->pdf_url; ?>" target="blank" class='btn btn-primary'> <i
                            class="fas fa-file-download"></i> &nbsp; Panduan Pembayaran
                    </a></center>
        </div>
        <?php endforeach ?>
    </div>

</div>
</div>