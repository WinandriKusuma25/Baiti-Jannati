<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengeluaran Donasi </h1>
        <?php $no = 1;
        foreach ($pengeluaran_donasi as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen donasi &nbsp;/&nbsp; Pengeluaran donasi &nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/pengeluaran_donasi/detail/' . $ad->id_pengeluaran ?>">Detail
                    pengeluaran donasi</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 shadow-sm">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengeluaran Donasi</h6>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <?php $no = 1;
                foreach ($pengeluaran_donasi as $b) : ?>
                <br>

                <div class="card-body  border-bottom-primary">

                    <h6 class="card-title text-dark"><b>Penanggung Jawab
                        </b>&nbsp;: <?= $b->name ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Tgl.Pengeluaran</b>&nbsp;:
                        <?=  date('d-m-Y H:i:s', strtotime($b->created_at)); ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Nominal
                        </b>&nbsp;:&nbsp;Rp <?= number_format($b->nominal, 2, ',', '.'); ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Keterangan : </b>&nbsp;
                        <?= $b->keterangan ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Terakhir di edit</b>&nbsp;:
                        <?php if ($b->updated_at == NULL) : ?>
                        <td class="project-state">
                            <span class="badge badge-success">Tidak pernah di edit</span>
                        </td>
                        <?php else : ?>
                        <td>
                            <?=  date('d-m-Y H:i:s', strtotime($b->updated_at)); ?></td>
                        </td>
                        <?php endif ?>
                        <hr>

                        <?php endforeach ?>
                        <p>
                            <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary right">
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