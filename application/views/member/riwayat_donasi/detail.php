<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Riwayat Donasi Transfer </h1>
        <small>
            <div class="text-muted">Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("member/riwayat_donasi"); ?>">Detail
                    Detail Riwayat Donasi Transfer</a>
            </div>
        </small>
    </div>

    <div class="row">
        <div class="col-xl-7 col-lg-7">
            <div class="card  shadow border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Pembayaran</h6>
                </div>
                <?php foreach ($transaksi_midtrans as $ad) : ?>


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
                <div class="card-text">&nbsp;&nbsp; Tgl. Transaksi
                    :&nbsp;<b><?=  date('d-m-Y H:i:s', strtotime($ad->transaction_time)); ?></b></div>
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
                    &nbsp;&nbsp; <a href="<?php echo base_url("member/riwayat_donasi"); ?>" class="btn btn-primary"> <i
                            class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    <!-- <hr width="90%"> -->

            </div>
            <?php endforeach ?>
        </div>

        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/invoice.svg" alt="">
                        <br>
                        <center><a href="<?= $ad->pdf_url; ?>" target="blank" class='btn btn-primary'> <i
                                    class="fas fa-file-download"></i> &nbsp; Panduan Pembayaran
                            </a></center>
                    </div>

                </div>
            </div>
        </div>

    </div>



</div>
</div>