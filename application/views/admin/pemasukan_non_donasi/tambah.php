<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pemasukan Non Donasi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Pemasukan Non Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/penngeluaran_donasi/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemasukan Donasi</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/pemasukan_non_donasi/tambah'); ?>"
                        enctype="multipart/form-data">
                        <div class=" form-group">
                            <label class="" for="pengurus">Penanggung Jawab</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus"
                                    class="js-example-placeholder-multiple js-states form-control" style="width: 100%">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"><?= $p->nama_pengurus ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>
                        <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>

                        <div class="form-group">
                            <label for="tgl_pemasukan">Tgl. Pemasukan</label>
                            <input type="date" class="form-control" id="tgl_pemasukan" name="tgl_pemasukan"
                                value="<?= set_value('tgl_pemasukan')  ?>">
                            <?= form_error('tgl_pemasukan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

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

                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>" class="btn btn-primary"> <i
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