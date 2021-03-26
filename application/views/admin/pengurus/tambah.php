<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pengurus</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp;&nbsp;Pengurus &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/pengurus/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card ">
                <div class="card-header bg-muted py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pengurus</h6>
                </div>
                <div class="card-body  border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/pengurus/tambah'); ?>">

                        <div class="form-group">
                            <label for="nama_pengurus">Nama</label>
                            <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus"
                                value="<?= set_value('nama_pengurus')  ?>">
                            <?= form_error('nama_pengurus', '<small class="text-danger pl-3">', '</small>'); ?>
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

                            </div>
                            <?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
                        </div>

                        <div class=" form-group">
                            <label class="" for="jabatan">Jabatan</label>
                            <div class="input-group">
                                <select name="id_jabatan" id="id_jabatan" class="custom-select">
                                    <option value="" selected disabled>Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j->id_jabatan ?>"><?= $j->jabatan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_jabatan', '<small class="text-danger">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="nama_pengurus">No Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" min="0"
                                value="<?= set_value('no_telp')  ?>">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class=" btn btn-success"><i class="fas fa-save"></i>&nbsp;Simpan</button>
                        <button type="reset" name="reset" class="btn btn-warning "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("admin/pengurus"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>