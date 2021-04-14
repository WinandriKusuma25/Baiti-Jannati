<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit pengurus</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp;&nbsp;Pengurus &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/pengurus/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data pengurus</h6>
                </div>

                <?php foreach ($pengurus as $p) : ?>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" id="id_pengurus" name="id_pengurus" value="<?= $p->id_pengurus; ?>">


                        <div class="form-group">
                            <label for="nama_pengurus">Nama</label>
                            <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus"
                                value="<?= $p->nama_pengurus; ?>">
                            <?= form_error('nama_pengurus', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= $p->jenis_kelamin == 'L' ? 'checked' : ''; ?>
                                        <?= set_radio('jenis_kelamin', 'L'); ?> value="L" type="radio" id="L"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="L">L</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= $p->jenis_kelamin == 'P' ? 'checked' : ''; ?>
                                        <?= set_radio('jenis_kelamin', 'P'); ?> value="P" type="radio" id="P"
                                        name="jenis_kelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="P">P</label>
                                </div>
                                <?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label class="" for="jabatan">Jabatan</label>
                            <div class="input-group">
                                <select name="id_jabatan" id="id_jabatan" class="custom-select">
                                    <option value="" selected disabled>Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j->id_jabatan ?>"
                                        <?= $j->id_jabatan == $p->id_jabatan ? "selected" : null ?>><?= $j->jabatan ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                        </div>



                        <div class="form-group">
                            <label for="nama">No Telp</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" min="0"
                                value="<?= $p->no_telp; ?>">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/pengurus"); ?>" class="btn btn-primary"> <i
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