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
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Pengeluaran Donasi</h6>
                </div>
                <?php foreach ($pengeluaran_donasi as $ad) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_pengeluaran" name="id_pengeluaran"
                            value="<?= $ad->id_pengeluaran; ?>">

                        <div class=" form-group">
                            <label class="" for="pengurus">Penanggung Jawab</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus" class="custom-select">
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

                        <div class="form-group">
                            <label for="tgl_pengeluaran">Tgl. Pengeluaran</label>
                            <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran"
                                value="<?= $ad->tgl_pengeluaran; ?>">
                            <?= form_error('tgl_pengeluaran', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <button type="submit" class=" btn btn-success"><i
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