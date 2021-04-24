<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaturan</h1>
        <?php $no = 1;
        foreach ($pengaturan as $ad) : ?>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Pengaturan&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'superadmin/pengaturan/detail/' . $ad->id_pengaturan ?>">Detail
                    Pengaturan</a></div>
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
            <div class="col">
                <?php $no = 1;
                foreach ($pengaturan as $b) : ?>
                <br>




                <div class="card-body  shadow-sm ">

                    <h6 class="card-title text-dark"><b>Foto Kondisi Anak Didik :</b>
                        <br>
                        <p>
                            <img src="<?= base_url('assets/images/pengaturan/') . $b->foto ?>" alt="..."
                                class=" card-image" width="30%">
                            <hr>

                        <h6 class="card-title text-dark"><b>Penulis


                            </b>&nbsp;: <?= $b->name ?></h6>
                        <hr>
                        <h6 class="card-title text-dark"><b>Tgl. Pembuatan</b>&nbsp;:
                            <?=  date('d-m-Y H:i:s', strtotime($b->created_at)); ?></h6>
                        <hr>
                        <h6 class="card-title text-dark"><b>Terakhir di edit</b>&nbsp;:
                            <?=  date('d-m-Y H:i:s', strtotime($b->updated_at)); ?></h6>
                        <hr>


                        <h6 class="card-title text-dark"><b>Sejarah : </b>&nbsp;<br>
                            <?= $b->sejarah ?></h6>
                        <hr>

                        <h6 class="card-title text-dark"><b>Kondisi Anak Didik : </b>&nbsp;<br>
                            <?= $b->kondisi ?></h6>
                        <hr>

                        <h6 class="card-title text-dark"><b>Kata-kata Bijak : </b>&nbsp;<br>
                            <?= $b->motivasi ?></h6>
                        <hr>



                        <h6 class="card-title text-dark"><b>Mitra Berbagi : </b>&nbsp;<br>
                            <?= $b->mitra_berbagi ?></h6>
                        <hr>



                        <?php endforeach ?>
                        <p>
                            <a href="<?php echo base_url("superadmin/pengaturan"); ?>" class="btn btn-primary right"> <i
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