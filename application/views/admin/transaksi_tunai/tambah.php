<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi Donasi</h1>
        <small>
            <div class="text-muted">Manajemen Donasi &nbsp;/&nbsp; Transaksi Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/transaksi_tunai/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Donasi</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/transaksi_tunai/tambah'); ?>"
                        enctype="multipart/form-data">


                        <div class="alert alert-primary" role="alert">
                            Data <b>Donatur</b> dan <b>Penerima</b>
                        </div>

                        <div class=" form-group">
                            <label class="" for="user">Donatur</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus" class="custom-select">
                                    <option value="" selected disabled>Pilih Donatur</option>
                                    <?php foreach ($users as $p) : ?>
                                    <option value="<?= $p->id_user ?>"><?= $p->name ?> | <?= $p->email ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label class="" for="pengurus">Penerima</label>
                            <div class="input-group">
                                <select name="id_pengurus" id="id_pengurus" class="custom-select">
                                    <option value="" selected disabled>Pilih pengurus</option>
                                    <?php foreach ($pengurus as $p) : ?>
                                    <option value="<?= $p->id_pengurus ?>"><?= $p->nama_pengurus ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_pengurus', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_donasi">Tanggal Donasi</label>
                            <input type="date" class="form-control date" id="tgl_donasi" name="tgl_donasi"
                                class="form-control date" value="<?= set_value('tgl_donasi')  ?>">
                            <?= form_error('tgl_donasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="jenis_donasi">Jenis Donasi</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= set_radio('jenis_donasi', 'keuangan'); ?> value="keuangan" type="radio"
                                        id="keuangan" name="jenis_donasi" class="custom-control-input">
                                    <label class="custom-control-label" for="keuangan">Keuangan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= set_radio('jenis_donasi', 'non keuangan'); ?> value="non keuangan"
                                        type="radio" id="non keuangan" name="jenis_donasi" class="custom-control-input">
                                    <label class="custom-control-label" for="non keuangan">Non Keuangan</label>
                                </div>
                                <?= form_error('jenis_donasi', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <div class="alert alert-primary" role="alert">
                            Detail <b>donasi</b> yang di berikan
                        </div>





                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori"
                                value="<?= set_value('kategori')  ?>">
                            <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" min="1"
                                value="<?= set_value('nominal')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1"
                                value="<?= set_value('jumlah')  ?>">
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows="" class="form-control"
                                value="<?= set_value('keterangan')  ?>"></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label for="foto">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" required autofocus>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>

                        <p>

                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                            <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet" type="text/css">
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
</div>