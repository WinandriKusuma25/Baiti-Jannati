<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Anak Didik</h1>
        <small>
            <div class="text-muted">Manajemen Pengguna &nbsp;/&nbsp; Anak Didik &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/anak_didik/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anak Didik</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('superadmin/anak_didik/tambah'); ?>"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= set_value('nama')  ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Wali</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                                value="<?= set_value('nama_wali')  ?>">
                            <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= set_radio('jenis_kelamin', 'L'); ?> value="L" type="radio" id="L"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="L">L</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= set_radio('jenis_kelamin', 'P'); ?> value="P" type="radio" id="P"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="P">P</label>
                                </div>
                                <?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?= set_value('tempat_lahir')  ?>">
                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control date" id="tgl_lahir" name="tgl_lahir"
                                class="form-control date" value="<?= set_value('tgl_lahir')  ?>">
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="50" rows="" class="form-control"
                                value="<?= set_value('alamat')  ?>"></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label for="foto">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" required autofocus>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>

                        <p>
                        <div class=" form-group">
                            <label class="" for="pengurus">Penanggung Jawab</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus"
                                    class="js-example-placeholder-multiple js-states form-control" style="width: 100%">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"><?= $p->nama_pengurus?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <br>


                        <button type="submit" class=" btn btn-primary"><i class="fas fa-save"></i>&nbsp;Simpan</button>

                        <button type="reset" name="reset" class="btn btn-dark "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("superadmin/anak_didik"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
</div>

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus",
    width: "100%",
});
</script>