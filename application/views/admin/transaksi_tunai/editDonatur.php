<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Donatur</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Pemasukan Transaksi Donasi Tunai &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/users/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">


        <div class="col-md-8 py-3">
            <div class="alert alert-primary" role="alert">
                <h6 class="alert-heading">
                    * Berikut Form untuk edit Data Donatur apabila terjadi kesalahan
                </h6>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Donatur</h6>
                </div>

                <?php foreach ($transaksi_tunai as $ad) : 
                    
                    // print_r( $ad );    
                ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_user" name="id_donasi" value="<?= $ad->id_donasi; ?>">
                        <div class="form-group">

                            <label class="" for="pengurus">Nama Donatur</label>
                            <div class="input-group">
                                <select name="id_user" id="id_user"
                                    class="js-example-placeholder-multiple js-states form-control" style="width: 100%">
                                    <option value="" selected disabled></option>
                                    <?php foreach ($users as $j) : ?>
                                    <option value="<?= $j->id_user ?>"
                                        <?= $j->id_user == $ad->id_user ? 'selected="selected"' : null ?>>
                                        <?= $j->name ?> |
                                        <?= $j->email ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="text">Tgl.Donasi</label>
                            <input type="text" class="form-control" id="tgl_donasi" name="tgl_donasi" readonly
                                value="<?= $ad->tgl_donasi; ?>">
                        </div>

                        <div class="form-group">
                            <label for="text">Penerima</label>
                            <input type="text" class="form-control" id="id_user_pengurus" name="id_user_pengurus"
                                readonly value="<?= $ad->id_user_pengurus; ?>">
                        </div>



                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-primary"> <i
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

<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Donatur"
});
</script>