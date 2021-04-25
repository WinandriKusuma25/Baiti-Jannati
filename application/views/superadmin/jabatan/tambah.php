<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Jabatan</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Jabatan &nbsp; / &nbsp; <a
                    href="<?php echo base_url("superadmin/jabatan/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Jabatan</h6>
                </div>

                <div class="card-body border-bottom-primary">

                    <form method="post" action="<?= base_url('superadmin/jabatan/tambah'); ?>">

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?= set_value('jabatan')  ?>">
                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class=" btn btn-primary"><i class="fas fa-save"></i>&nbsp;Simpan</button>

                        <button type="reset" name="reset" class="btn btn-dark "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("superadmin/jabatan"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>
    </div>
</div>
</div>