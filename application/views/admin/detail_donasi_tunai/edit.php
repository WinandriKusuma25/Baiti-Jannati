<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Detail Transaksi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen donasi &nbsp;/&nbsp; Detail Donasi Tunai &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/berita/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card  shadow-sm  border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data Detail Donasi</h6>
                </div>

                <?php foreach ($detail_donasi as $b) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_detail_donasi" name="id_detail_donasi"
                            value="<?= $b->id_detail_donasi; ?>">
                        <input type="text" id="id_donasi" name="id_donasi"
                            value="<?= $b->id_donasi; ?>">

                        <div class="form-group">

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    value="<?= $b->kategori; ?>">
                                <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal"
                                    value="<?= $b->nominal; ?>">
                                <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    value="<?= $b->jumlah; ?>">
                                <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>



                            <div class="form-group ">
                                <label for="foto">Foto</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/images/donasi_non_keuangan/') . $b->image ?>"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="iamge" name="image">
                                                <label class="custom-file-label" for="image">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach ?>
                            <p>
                            <p>
                            <p>
                                <button type="submit" class=" btn btn-primary"><i
                                        class="fas fa-save"></i>&nbsp;Simpan</button>

                                <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->
                                <?php $no = 1;
                                 foreach ($detail_donasi as $ad) : ?>
                                <a href="<?= base_url() . 'admin/transaksi_tunai/detail/' . $ad->id_detail_donasi ?>"
                                    class="btn btn-primary"> <i class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                                <?php endforeach ?>
                    </form>
                </div>
            </div>
            <br>
        </div>
        <br>
    </div>
    <br>
</div>
</div>