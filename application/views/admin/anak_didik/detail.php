<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Anak Didik</h1>
        <?php $no = 1;
        foreach ($anak_didik as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Anak Didik&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/users/detail/' . $ad->id_anak_didik ?>">Detail Anak Didik</a></div>
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
            <h6 class="m-0 font-weight-bold text-primary">Detail Anak Didik</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php foreach ($anak_didik as $ad) : ?>
                <img src="<?= base_url('assets/images/anak_didik/') . $ad->foto ?>" class="card-img" alt="..."
                    width="100px">
            </div>


            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title text-dark"><b>Nama</b>&nbsp;:
                        <?= $ad->nama ?>
                        <hr>
                        <h5 class="card-title text-dark"><b>Jenis
                                Kelamin</b>
                            &nbsp;:
                            <?= $ad->jenis_kelamin ?></h5>
                        <hr>
                        <h5 class="card-title text-dark"><b>TTL</b>
                            &nbsp;:
                            <?= $ad->tempat_lahir ?>,
                            <?= date('d F Y', strtotime($ad->tgl_lahir)); ?> </h5>
                        <hr>
                        <h5 class="card-title text-dark"><b>Alamat</b>&nbsp;:
                            <?= $ad->alamat ?></h5>
                        <hr>
                        <h5 class="card-title text-dark"><b>Orang Tua / Wali
                            </b>&nbsp;: <?= $ad->nama_wali ?></h5>
                        <hr>

                        <h5 class="card-title text-dark"><b>Penanggung
                                Jawab :
                            </b>&nbsp;: <?= $ad->nama_pengurus ?></h5>
                        <hr>



                        <?php endforeach ?>
                        <p>

                            <a href="<?php echo base_url("admin/anak_didik"); ?>" class="btn btn-primary"> <i
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