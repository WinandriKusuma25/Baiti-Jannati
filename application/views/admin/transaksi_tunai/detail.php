<?php $no = 1;
foreach ($transaksi_tunai as $p) : ?>
<?php if ($p->jenis_donasi == "keuangan") : ?>
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Tunai</h1>
        <?php $no = 1;
                foreach ($transaksi_tunai as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Transaksi Tunai&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/transaksi_tunai/detail/' . $ad->id_donasi ?>">Detail Transaksi
                    Tunai</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3  border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Tunai</h6>
        </div>
        <div class="row no-gutters">
            <?php foreach ($transaksi_tunai as $dnk) : ?>
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title text-dark"><b>Nama Donatur</b>&nbsp;:
                        <?= $ad->name ?>
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Penerima </b>
                        &nbsp;:
                        <td><?= $dnk->nama_pengurus ?></td>
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Tgl. Donasi</b>
                        &nbsp;:
                        <?= $dnk->tgl_donasi ?>
                        <!-- <?= date('d F Y', strtotime($ad->tgl_lahir)); ?> </h5> -->
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Jenis Donasi</b>&nbsp;:
                        <?= $dnk->jenis_donasi ?></h5>
                    <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Nominal</b>&nbsp;:
                        Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?>
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Keterangan</b>&nbsp;:
                        <?= $dnk->keterangan ?></h5>
                    <hr>
                    </h5>





                    <?php endforeach ?>
                    <p>

                        <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<?php else : ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Tunai</h1>
        <?php $no = 1;
                foreach ($transaksi_tunai as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Transaksi Tunai&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/transaksi_tunai/detail/' . $ad->id_donasi ?>">Detail Transaksi
                    Tunai</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3  border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Tunai</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php foreach ($transaksi_tunai as $dnk) : ?>
                <img src="<?= base_url('assets/images/donasi_non_keuangan/') . $dnk->image ?>" class="card-img"
                    alt="..." width="100px">
            </div>


            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title text-dark"><b>Nama Donatur</b>&nbsp;:
                        <?= $ad->name ?>
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Penerima </b>
                        &nbsp;:
                        <td><?= $dnk->nama_pengurus ?></td>
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Tgl. Donasi</b>
                        &nbsp;:
                        <?= $dnk->tgl_donasi ?>
                        <!-- <?= date('d F Y', strtotime($ad->tgl_lahir)); ?> </h5> -->
                        <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Jenis Donasi</b>&nbsp;:
                        <?= $dnk->jenis_donasi ?></h5>
                    <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Kategori</b>&nbsp;:
                        <?= $dnk->kategori ?></h5>
                    <hr>
                    </h5>
                    <!-- <h5 class="card-title text-dark"><b>Nominal</b>&nbsp;:
                        <?= $dnk->nominal ?></h5>
                    <hr>
                    </h5> -->
                    <h5 class="card-title text-dark"><b>Jumlah</b>&nbsp;:
                        <?= $dnk->jumlah ?></h5>
                    <hr>
                    </h5>
                    <h5 class="card-title text-dark"><b>Keterangan</b>&nbsp;:
                        <?= $dnk->keterangan ?></h5>
                    <hr>
                    </h5>





                    <?php endforeach ?>
                    <p>

                        <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php endif ?>

<?php endforeach ?>