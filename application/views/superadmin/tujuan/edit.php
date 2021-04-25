<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Tujuan</h1>
        <small>
            <div class="text-muted"> Pengaturan profil &nbsp;/&nbsp; Tujuan &nbsp; / &nbsp; <a
                    href="<?php echo base_url("superadmin/tujuan/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data tujuan</h6>
                </div>

                <?php foreach ($tujuan as $j) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="">
                        <input type="hidden" id="id_tujuan" name="id_tujuan" value="<?= $j->id_tujuan; ?>">


                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $j->judul; ?>">
                            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="50" rows=""
                                class="form-control"><?= $j->deskripsi; ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <a href="<?php echo base_url("superadmin/tujuan"); ?>" class="btn btn-primary"> <i
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
</script>