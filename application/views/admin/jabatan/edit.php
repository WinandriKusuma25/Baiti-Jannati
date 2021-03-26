<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Jabatan</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Jabatan &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/jabatan/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data jabatan</h6>
                </div>

                <?php foreach ($jabatan as $j) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="">
                        <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $j->id_jabatan; ?>">

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?= $j->jabatan; ?>">
                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <a href="<?php echo base_url("admin/jabatan"); ?>" class="btn btn-primary"> <i
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