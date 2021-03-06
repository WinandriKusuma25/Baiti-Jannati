<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Profil</h1>
        <small>
            <div class="text-muted">Manajemen Pengguna &nbsp;/&nbsp; Data Profil &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/pengaturan/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Profil</h6>
                </div>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('superadmin/pengaturan/tambah'); ?>"
                        enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="sejarah">Sejarah</label>
                                <textarea name="sejarah" id="sejarah" cols="50" rows="" class="form-control"></textarea>
                                <?= form_error('sejarah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="kondisi">Kondisi</label>
                                <textarea name="kondisi" id="kondisi" cols="50" rows="" class="form-control"></textarea>
                                <?= form_error('', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <label for="foto">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto" required autofocus>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                            </div>
                            <br><br>

                            <div class=" form-group">
                                <label for="mitra_berbagi">Mitra Berbagi</label>
                                <textarea name="mitra_berbagi" id="mitra_berbagi" cols="50" rows=""
                                    class="form-control"></textarea>
                                <?= form_error('mitra_berbagi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="motivasi">Motivasi</label>
                                <textarea name="motivasi" id="motivasi" cols="50" rows=""
                                    class="form-control"></textarea>
                                <?= form_error('motivasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class=" form-group">
                                <label for="lokasi">Lokasi</label>
                                <textarea name="lokasi" id="lokasi" cols="50" rows="" class="form-control"></textarea>
                                <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="number" class="form-control" id="kontak" name="kontak"
                                    value="<?= set_value('kontak')  ?>">
                                <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?= set_value('email')  ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("superadmin/pengaturan"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('sejarah');
CKEDITOR.replace('kondisi');
CKEDITOR.replace('mitra_berbagi');
CKEDITOR.replace('motivasi');
CKEDITOR.replace('lokasi');
</script>