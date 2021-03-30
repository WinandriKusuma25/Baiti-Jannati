<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Status Donatur</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; Donatur &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/users/edit"); ?>">Edit Status</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Status Data Donatur</h6>
                </div>

                <?php foreach ($users as $ad) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_user" name="id_user" value="<?= $ad->id_user; ?>">


                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>


                        <div class="form-group">
                            <label for="text">Email</label>
                            <input type="text" class="form-control" id="email" name="email" readonly
                                value="<?= $ad->email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="text">Hak Akses</label>
                            <input type="text" class="form-control" id="role" name="role" readonly
                                value="<?= $ad->role; ?>">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->is_active == 'aktif' ? 'checked' : ''; ?>
                                        <?= set_radio('is_active', 'aktif'); ?> value="aktif" type="radio" id="aktif"
                                        name="is_active" class="custom-control-input">
                                    <label class="custom-control-label" for="aktif">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->is_active == 'pasif' ? 'checked' : ''; ?>
                                        <?= set_radio('is_active', 'pasif'); ?> value="pasif" type="radio" id="pasif"
                                        name="is_active" class="custom-control-input">
                                    <label class="custom-control-label" for="pasif">Belum Aktif</label>
                                </div>
                                <?= form_error('is_active', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-primary"> <i
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