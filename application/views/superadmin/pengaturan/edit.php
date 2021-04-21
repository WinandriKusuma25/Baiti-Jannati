<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengaturan</h1>
        <small>
            <div class="text-muted">Pengaturan profil&nbsp;/&nbsp;Pengaturan&nbsp; / &nbsp; <a
                    href="<?php echo base_url("superadmin/pengaturan/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card  shadow-sm  border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data Pengaturan</h6>
                </div>

                <?php foreach ($pengaturan as $b) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_pengaturan" name="id_pengaturan" value="<?= $b->id_pengaturan; ?>">

                        <div class="form-group">

                            <div class="form-group">
                                <label for="text">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" readonly
                                    value="<?= $b->name; ?>">
                            </div>

                            <div class=" form-group">
                                <label for="sejarah">Sejarah</label>
                                <textarea name="sejarah" id="sejarah" cols="50" rows=""
                                    class="form-control"><?= $b->sejarah; ?></textarea>
                                <?= form_error('sejarah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="kondisi">Kondisi</label>
                                <textarea name="kondisi" id="kondisi" cols="50" rows=""
                                    class="form-control"><?= $b->kondisi; ?></textarea>
                                <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                            <div class="col-sm-3">
                            <img src="<?= base_url('assets/images/pengaturan/') . $b->foto ?>"
                                        class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                            <label for="foto">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            </div>
                            </div>

                            <div class=" form-group">
                                <label for="mitra_berbagi">Mitra Berbagi</label>
                                <textarea name="mitra_berbagi" id="mitra_berbagi" cols="50" rows=""
                                    class="form-control"><?= $b->mitra_berbagi; ?></textarea>
                                <?= form_error('mitra_berbagi', '<small class="text-danger pl-3">', '</small>'); ?>
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

                            <a href="<?php echo base_url("superadmin/pengaturan"); ?>" class="btn btn-primary"> <i
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
CKEDITOR.replace('sejarah');
CKEDITOR.replace('kondisi');
CKEDITOR.replace('mitra_berbagi');
// CKEDITOR.replace('foto');
</script>

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus"
});
</script>