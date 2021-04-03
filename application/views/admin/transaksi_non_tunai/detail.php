<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
        <small>
            <div class="text-muted">Manajemen Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/transaksi_non_tunai"); ?>">Detail
                    Transaksi Non Tunai</a>
            </div>
        </small>
    </div>

    <div class=" d-flex flex-wrap">
        <?php foreach ($transaksi_midtrans as $ad) : ?>
        <div class="card mr-3 mb-3 border-bottom-primary" style="width:500px; height:540px">

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
            <p>
                <center> <a href="<?php echo base_url("admin/transaksi_non_tunai"); ?>" class="btn btn-primary"> <i
                            class="fas fa-arrow-left"></i>&nbsp;Kembali </a></center>

        </div>
        <?php endforeach ?>
    </div>
</div>
</div>