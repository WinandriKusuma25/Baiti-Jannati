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
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Berita Kegiatan</h6>
        </div>
        <div class="row no-gutters">
            <div class="col">
                <?php $no = 1;
                foreach ($berita as $b) : ?>
                <br>
                <center>
                    <h4 class="card-title text-dark">Judul :
                        &nbsp;
                        <?= $b->judul ?></h4>
                </center>
                <center><img src="<?= base_url('assets/images/berita/') . $b->foto ?>" alt="..." class=" card-image"
                        width="30%">
                </center>

                <div class="card-body  border-bottom-primary">

                    <h6 class="card-title text-dark"><b>Penulis


                        </b>&nbsp;: <?= $b->nama_pengurus ?></h6>
                    <hr>
                    <h6 class="card-title text-dark"><b>Tgl.Kegiatan</b>&nbsp;:
                        <?= date('d F Y', strtotime($b->tgl_kegiatan)); ?></h6>
                    <hr>

                    <h6 class="card-title text-dark"><b>Deskripsi : </b>&nbsp;<br>
                        <?= $b->deskripsi ?></h6>
                    <hr>

                    <?php endforeach ?>
                    <p>
                        <a href="<?php echo base_url("admin/berita"); ?>" class="btn btn-primary right"> <i
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