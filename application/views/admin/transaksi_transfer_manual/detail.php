<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Donasi Transfer </h1>
        <?php $no = 1;
        foreach ($transaksi_transfer as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen donasi &nbsp;/&nbsp; Transaksi Transfer &nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/transaksi_transfer_manual/detail/' . $ad->id_transfer ?>">Detail
                    Donasi Transfer</a></div>
        </small>
        <?php endforeach ?>
    </div>


    <div class="row">
        <div class="col-xl-7 col-lg-7">
            <div class="card  shadow border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Pembayaran</h6>
                </div>
                <?php foreach ($transaksi_transfer as $ad) : ?>


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


                <div class="card-text">&nbsp;&nbsp; Dari Bank :&nbsp;<b><?= $ad->bank ?></b></div>
                <div class="card-text">&nbsp;&nbsp; No. Rekening :&nbsp;<b><?= $ad->no_rekening ?></b></div>
                <div class="card-text">&nbsp;&nbsp; Tujuan Bank :&nbsp;<b><?= $ad->nama_bank ?></b></div>
                <div class="card-text">&nbsp;&nbsp; Nominal :&nbsp;<b> Rp.
                        <?= number_format($ad->nominal, 2, ',', '.'); ?></b></div>
                <div class="card-text">&nbsp;&nbsp; Tgl. Transaksi
                    :&nbsp;<b><?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></b></div>
                <br>
                <div class="card-text">&nbsp;&nbsp;&nbsp;Terakhir di edit&nbsp;:
                    <?php if ($ad->updated_at== NULL) : ?>

                    <span class="badge badge-success">Belum Pernah di edit</span>

                    <?php else : ?>

                    <?=  date('d-m-Y H:i:s', strtotime($ad->updated_at)); ?> <?php endif ?>

                    <?php if ($ad->status == "diterima") : ?>
                    <div class="project-state">
                        &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-success"> Sukses</span>
                    </div>
                    <?php elseif ($ad->status == "diproses") : ?>
                    <div class="project-state">
                        &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-warning"> Pending</span>
                    </div>
                    <?php else : ?>
                    <div class="project-state">
                        &nbsp;&nbsp;&nbsp;Status Pembayaran : <span class="badge badge-danger">Gagal</span>
                    </div>
                    <?php endif ?>


                </div>
                <center>Bukti : </center>
                <center><img src="<?= base_url('assets/images/bukti/') . $ad->bukti ?>" alt="..." class=" card-image"
                        width="50%"></center>
                <p>
                <p>
                    &nbsp;&nbsp; <a href="<?php echo base_url("admin/transaksi_transfer_manual"); ?>"
                        class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    <!-- <hr width="90%"> -->

                    <?php endforeach ?>
            </div>



        </div>
        <br>
    </div>
</div>