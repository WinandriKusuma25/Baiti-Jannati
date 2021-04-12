<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Anak Didik</h1>
        <small>
            <div class="text-muted"> Manejemen Penguuna &nbsp;/&nbsp; Anak Didik &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/anak_didik/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Anak Didik</h6>
                </div>
                <?php foreach ($anak_didik as $ad) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_anak_didik" name="id_anak_didik" value="<?= $ad->id_anak_didik; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $ad->nama; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->jenis_kelamin == 'L' ? 'checked' : ''; ?>
                                        <?= set_radio('jenis_kelamin', 'L'); ?> value="L" type="radio" id="L"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="L">L</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->jenis_kelamin == 'P' ? 'checked' : ''; ?>
                                        <?= set_radio('jenis_kelamin', 'P'); ?> value="P" type="radio" id="P"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="P">P</label>
                                </div>
                                <?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?= $ad->tempat_lahir; ?>">
                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="<?= $ad->tgl_lahir; ?>">
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali"
                                value="<?= $ad->nama_wali; ?>">
                            <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="50" rows=""
                                class="form-control"><?= $ad->alamat; ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group ">
                            <label for="foto">Foto</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/anak_didik/') . $ad->foto ?>"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label class="custom-file-label" for="image"><?= $ad->foto; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="" for="pengurus">Penanggung Jawab</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus"
                                    class="js-example-placeholder-multiple js-states form-control" style="width: 100%">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"
                                        <?= $p->id_pengurus == $ad->id_pengurus ? "selected" : null ?>>
                                        <?= $p->nama_pengurus ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <?php endforeach ?>
                        <br>
                        <button type="submit" class=" btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button>

                        <a href="<?php echo base_url("admin/anak_didik"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                        <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet" type="text/css">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus"
});
</script>