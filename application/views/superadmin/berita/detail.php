<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Berita Kegiatan</h1>
        <?php $no = 1;
        foreach ($berita as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Berita &nbsp;/&nbsp; Berita Kegiatan&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/berita/detail/' . $ad->id_berita ?>">Detail Berita Kegiatan</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card shadow-sm  mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Berita Kegiatan</h6>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <?php $no = 1;
                foreach ($berita as $b) : ?>
                <br>
                <center>
                    <h4 class="card-title text-dark"><b>Judul</b> :
                        &nbsp;
                        <?= $b->judul ?></h4>
                </center>
                <center><img src="<?= base_url('assets/images/berita/') . $b->foto ?>" alt="..." class=" card-image"
                        width="30%">
                </center>

                <div class="card-body  shadow-sm  border-bottom-primary">

                    <h6 class="card-title text-dark"><b>Penulis


                        </b>&nbsp;: <?= $b->name ?></h6>
                    <hr>
                    <h6 class="card-title text-dark"><b>Tgl. Pembuatan</b>&nbsp;:
                        <?=  date('d-m-Y H:i:s', strtotime($b->created_at)); ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Terakhir di edit</b>&nbsp;:
                        <?php if ($b->updated_at== NULL) : ?>

                        <span class="badge badge-success">Belum Pernah di edit</span>

                        <?php else : ?>

                        <?=  date('d-m-Y H:i:s', strtotime($b->updated_at)); ?> <?php endif ?>
                        <hr>


                        <h6 class="card-title text-dark"><b>Deskripsi : </b>&nbsp;<br>
                            <?= $b->deskripsi ?></h6>
                        <hr>

                        <?php endforeach ?>
                        <p>
                            <a href="<?php echo base_url("superadmin/berita"); ?>" class="btn btn-primary right"> <i
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