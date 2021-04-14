<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- <script src="<?= base_url(); ?>/assets/css/select2.css"></script> -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah berita</h1>
        <small>
            <div class="text-muted"> Manajemen berita &nbsp;/&nbsp; berita &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/berita/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row  justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class=" card shadow-sm border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form tambah data Berita Kegiatan</h6>
                </div>

                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/berita/tambah'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="" for="pengurus">Penulis</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus"
                                    class="js-example-placeholder-multiple js-states form-control" style="width: 100%">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"><?= $p->nama_pengurus ?></option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kegiatan">Tgl. kegiatan</label>
                            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan"
                                value="<?= set_value('tgl_kegiatan')  ?>">
                            <?= form_error('tgl_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="<?= set_value('judul')  ?>">
                            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nim">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="50" rows="" class="form-control"></textarea>
                        </div>


                        <label for="foto">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>
                        <p>
                        <p>
                        <p>

                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/berita"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali</a>


                    </form>

                </div>
                <br>
            </div>
            <br>
        </div>
    </div>
</div>

<script>
CKEDITOR.replace('deskripsi');
</script>

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus",
    width: "100%",
});
</script>