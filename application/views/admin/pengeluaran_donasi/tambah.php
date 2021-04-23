<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pengeluaran Donasi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Pengeluaran Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/penngeluaran_donasi/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengeluaran Donasi</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/pengeluaran_donasi/tambah'); ?>"
                        enctype="multipart/form-data">

                        <?php foreach ($user as $b) : ?>
                        <div class="form-group">
                            <label for="text">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $b->name; ?>">
                        </div>

                        <?php endforeach ?>


                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" min="1"
                                value="<?= set_value('nominal')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <div class=" form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows="" class="form-control"
                                value="<?= set_value('keterangan')  ?>"></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <p>

                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary"> <i
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
CKEDITOR.replace('keterangan');
</script>

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus"
});
</script>