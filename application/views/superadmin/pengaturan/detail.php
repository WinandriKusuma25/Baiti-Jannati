<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaturan</h1>
        <?php $no = 1;
        foreach ($pengaturan as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Pengaturan&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'superadmin/pengaturan/detail/' . $ad->id_pengaturan ?>">Detail Pengaturan</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengaturan</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php foreach ($pengaturan as $ad) : ?>
                <img src="<?= base_url('assets/images/pengaturan/') . $ad->foto ?>" class="card-img" alt="..."
                    width="100px">
            </div>


            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title text-dark"><b>Sejarah</b>&nbsp;:
                        <?= $ad->sejarah ?>
                        <hr>
                        <h5 class="card-title text-dark"><b>Kondisi</b>
                            &nbsp;:
                            <?= $ad->kondisi ?></h5>
                        <hr>
                        <?php endforeach ?>
                        <p>
                            <a href="<?php echo base_url("superadmin/pengaturan"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                        </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->