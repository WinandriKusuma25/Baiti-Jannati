<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengeluaran Donasi</h1>
        <small>
            <div class="text-muted"> Manejemen Donasi &nbsp;/&nbsp; Pengeluaran Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/pengeluaran_donasi/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengeluaran Donasi</h6>
                </div>
                <?php foreach ($pengeluaran_donasi as $ad) : ?>
                <div class="card-body shadow-sm">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_pengeluaran" name="id_pengeluaran"
                            value="<?= $ad->id_pengeluaran; ?>">

                        <div class="form-group">
                            <label for="name">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>


                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" min="1"
                                value="<?= $ad->nominal; ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label for="keterangan">keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows=""
                                class="form-control"><?= $ad->keterangan; ?></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
CKEDITOR.replace('keterangan');
</script>

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Pengurus"
});
</script>