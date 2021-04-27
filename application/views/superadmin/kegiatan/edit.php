<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit kegiatan</h1>
        <small>
            <div class="text-muted">kegiatan profil&nbsp;&nbsp;/&nbsp;&nbsp;kegiatan&nbsp; / &nbsp; <a
                    href="<?php echo base_url("superadmin/kegiatan/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card  shadow-sm  border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data kegiatan</h6>
                </div>

                <?php foreach ($kegiatan as $b) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_kegiatan" name="id_kegiatan" value="<?= $b->id_kegiatan; ?>">

                        <div class="form-group">

                            <div class="form-group">
                                <label for="text">Pembuat</label>
                                <input type="text" class="form-control" id="name" name="name" readonly
                                    value="<?= $b->name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $b->judul; ?>">
                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="deskripsi">deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="50" rows=""
                                    class="form-control"><?= $b->deskripsi; ?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group ">
                                <label for="foto">Foto</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/images/kegiatan/') . $b->foto ?>"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                                <label class="custom-file-label" for="image"><?= $b->foto; ?></label>
                                            </div>
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

                            <a href="<?php echo base_url("superadmin/kegiatan"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
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

<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('deskripsi');
// CKEDITOR.replace('foto');
</script>