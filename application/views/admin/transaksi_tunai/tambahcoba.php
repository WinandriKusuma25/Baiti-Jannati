<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pemasukan Donasi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Donasi Tunai &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/penngeluaran_donasi/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemasukan Donasi Tunai</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/pengeluaran_donasi/tambah'); ?>"
                        enctype="multipart/form-data">

                        <div class="text-primary">
                            <h5><b>Data Penerima dan Donatur</b></h5>
                        </div>
                        <hr>
                        <?php foreach ($user as $b) : ?>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="text">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="name" name="name" readonly
                                    value="<?= $b->name; ?>">
                            </div>

                            <div class="form-group col-6">
                                <label class="" for="user">Nama Donatur</label>
                                <div class="input-group">
                                    <select name="id_user" id="id_user"
                                        class="js-example-placeholder-multiple js-states form-control"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Donatur</option>
                                        <?php foreach ($users as $p) : ?>
                                        <option value="<?= $p->id_user?>"><?= $p->name ?> | <?= $p->email ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <?php endforeach ?>

                        <div class="text-primary">
                            <h5><b>Waktu Transaksi</b></h5>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Tgl. Transaksi </label>
                                <input type="text" name="tgl_penjualan" value="<?= date('d/m/Y') ?>" readonly
                                    class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Jam Transaksi</label>
                                <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly
                                    class="form-control">
                            </div>
                        </div>

                        <div class="text-primary">
                            <h5><b>Donasi Non Keuangan</b></h5>
                        </div>
                        <hr>
                        <div class="form-row">

                            <div class="form-group col-6">
                                <label>Jenis Donasi </label>
                                <input type="text" name="tgl_penjualan" value="Non Keuangan" readonly
                                    class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label for="id_kategori">Kategori</label>

                                <div class="input-group">
                                    <select name="id_kategori" id="id_kategori" class="custom-select">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <?php foreach ($kategori as $p) : ?>
                                        <option value="<?= $p->id_kategori?>"><?= $p->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" href="<?= base_url('admin/kategori/tambah'); ?>"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group col-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" value="" class="form-control" min="1">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class=" form-group col-6">
                                <label for="foto">Bukti</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" required
                                        autofocus>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                </div>
                            </div>

                            <div class=" form-group col-5">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="50" rows="" class="form-control"
                                    value="<?= set_value('keterangan')  ?>"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" id="tambah"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>

                        <div class="text-primary">
                            <h5><b>Donasi Keuangan</b></h5>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Jenis Donasi </label>
                                <input type="text" name="tgl_penjualan" value="Keuangan" readonly class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label>Nominal</label>
                                <input type="number" name="nominal" value="" class="form-control" min="1">
                            </div>

                            <div class=" form-group col-5">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="50" rows="" class="form-control"
                                    value="<?= set_value('keterangan')  ?>"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" id="tambah"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                        </div>


                        <div class="keranjang">
                            <div class="text-primary">
                                <h5><b>Detail Transaksi Donasi</b></h5>
                            </div>
                            <hr>
                            <table class="table table-bordered" id="keranjang">
                                <thead>
                                    <tr>
                                        <td width="15%">Jenis Donasi</td>
                                        <td width="15%">Kategori</td>
                                        <td width="15%">Nominal</td>
                                        <td width="10%">Jumlah</td>
                                        <td width="10%">Bukti</td>
                                        <td width="10%">Keterangan</td>
                                        <td width="10%">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>




                        <p>
                        <p>

                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
</div>

<!-- <script>
CKEDITOR.replace('keterangan');
</script> -->

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Donatur"
});
</script>

<script>
$(".js-example-placeholder-multiple2 ").select2({
    placeholder: "  Pilih Katgeori"
});
</script>