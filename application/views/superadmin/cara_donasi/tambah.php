<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Cara Donasi</h1>
        <small>
            <div class="text-muted"> Pengaturan Profil&nbsp;/&nbsp; cara_donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("superadmin/cara_donasi/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Cara Berdonasi</h6>
                </div>

                <div class="card-body border-bottom-primary">

                    <form method="post" action="<?= base_url('superadmin/cara_donasi/tambah'); ?>">



                        <div class=" form-group">
                            <label for="pertanyaan">pertanyaan</label>
                            <textarea name="pertanyaan" id="pertanyaan" cols="50" rows=""
                                class="form-control"></textarea>
                            <?= form_error('pertanyaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label for="jawaban">Jawaban</label>
                            <textarea name="jawaban" id="jawaban" cols="50" rows="" class="form-control"></textarea>
                            <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>




                        <button type="submit" class=" btn btn-primary"><i class="fas fa-save"></i>&nbsp;Simpan</button>

                        <button type="reset" name="reset" class="btn btn-dark "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("superadmin/cara_donasi"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>
    </div>
</div>
</div>

<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
// CKEDITOR.replace('pertanyaan');
</script>