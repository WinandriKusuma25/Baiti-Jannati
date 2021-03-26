<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit berita</h1>
        <small>
            <div class="text-muted"> Manajemen peminjaman &nbsp;/&nbsp; Daftar berita &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/berita/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card  border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data berita</h6>
                </div>

                <?php foreach ($berita as $b) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_berita" name="id_berita" value="<?= $b->id_berita; ?>">

                        <div class="form-group">
                            <label class="" for="pengurus">Penulis</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus"
                                    class="js-example-placeholder-multiple js-states form-control">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"
                                        <?= $p->id_pengurus == $b->id_pengurus ? "selected" : null ?>>
                                        <?= $p->nama_pengurus ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Tgl. Kegiatan</label>
                            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan"
                                value="<?= $b->tgl_kegiatan; ?>">
                            <?= form_error('tgl_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $b->judul; ?>">
                            <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="50" rows=""
                                class="form-control"><?= $b->deskripsi; ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group ">
                            <label for="foto">Foto</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/berita/') . $b->foto ?>"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
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
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/berita"); ?>" class="btn btn-primary"> <i
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

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus"
});
</script>