<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Memvalidasi Transaksi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; &nbsp; Transaksi Transfer / &nbsp; <a
                    href="<?php echo base_url("admin/transaksi_transfer_manual"); ?>">Edit Transaksi</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">


        <div class="col-md-8 py-3">
            <div class="alert alert-primary" role="alert">
                <h6 class="alert-heading">
                    * Berikut Form untuk memvalidasi donasi transfer manual
                </h6>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Status Data Donasi</h6>
                </div>

                <?php foreach ($transaksi_transfer as $ad) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_transfer" name="id_transfer" value="<?= $ad->id_transfer; ?>">


                        <div class="form-row">

                            <div class="form-group col-6">
                                <label for="text">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" readonly
                                    value="<?= $ad->name; ?>">
                            </div>


                            <div class="form-group col-6">
                                <label for="text">Email</label>
                                <input type="text" class="form-control" id="email" name="email" readonly
                                    value="<?= $ad->email; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="text"> Dari Bank</label>
                                <input type="text" class="form-control" id="bank" name="bank" readonly
                                    value="<?= $ad->bank; ?>">
                            </div>


                            <div class="form-group col-6">
                                <label for="text"> No.Rekening</label>
                                <input type="text" class="form-control" id="norekening" name="norekening" readonly
                                    value="<?= $ad->norekening; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="text">Tujuan Bank</label>
                                <input type="text" class="form-control" id="id_bank" name="id_bank" readonly
                                    value="<?= $ad->nama_bank; ?>">
                            </div>

                            <div class="form-group col-6">
                                <label for="text">Tgl. Transaksi</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" readonly
                                    value="<?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?>">
                            </div>
                        </div>

                        <b>
                            <center>Bukti : </center>
                        </b>
                        <center><img src="<?= base_url('assets/images/bukti/') . $ad->bukti ?>" alt="..."
                                class=" card-image" width="50%"></center>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->status == 'diterima' ? 'checked' : ''; ?>
                                        <?= set_radio('status', 'diterima'); ?> value="diterima" type="radio"
                                        id="diterima" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="diterima">Di terima</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->status == 'diproses' ? 'checked' : ''; ?>
                                        <?= set_radio('status', 'diproses'); ?> value="diproses" type="radio"
                                        id="diproses" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="diproses">Di proses</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input <?= $ad->status == 'ditolak' ? 'checked' : ''; ?>
                                        <?= set_radio('status', 'ditolak'); ?> value="ditolak" type="radio" id="ditolak"
                                        name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="ditolak">Di tolak</label>
                                </div>
                                <?= form_error('status', '<span class="text-danger small">', '</span>'); ?>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
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