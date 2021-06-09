<!-- Begin Page Content -->
<?php 
foreach ($bank_transfer as $p) : ?>
<?php if ($p->status == "diproses") : ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Donasi</h1>
        <small>
            <div class="text-muted"> Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("member/transaksi_transfer_manual"); ?>">Edit
                    Donasi</a>
            </div>
        </small>
    </div>
    <div class="row">

        <div class="col-xl-7 col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Donasi</h6>
                </div>

                <?php foreach ($bank_transfer as $b) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" id="id_transfer" name="id_transfer" value="<?= $b->id_transfer; ?>">
                        <?php
                        foreach ($user as $ad) : ?>
                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>
                        <?php endforeach ?>

                        <div class="form-group">
                            <label for="nama">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" min="1"
                                placeholder="Masukkan nominal Anda" value="<?= $b->nominal; ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Bank </label>
                            <input type="text" class="form-control" id="bank" name="bank"
                                placeholder="Masukkan nama Bank Anda" value="<?= $b->bank; ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <div class="form-group">
                            <label for="nama">No. Rekening</label>
                            <input type="number" class="form-control" id="norekening" name="norekening" min="1"
                                placeholder="Masukkan No. Rekening Anda" value="<?= $b->norekening; ?>">
                            <?= form_error('norekening', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label class="" for="bank">Bank Tujuan</label>
                            <div class="input-group">
                                <select name="id_bank" id="id_bank" class="custom-select">
                                    <option value="" selected disabled>Pilih bank</option>
                                    <?php foreach ($bank as $j) : ?>
                                    <option value="<?= $j->id_bank ?>"
                                        <?= $j->id_bank == $b->id_bank ? "selected" : null ?>><?= $j->nama_bank ?> |
                                        <?= $j->no_rekening ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('bank', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows=""
                                class="form-control"><?= $b->keterangan; ?></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group ">
                            <label for="foto">Foto Bukti Transfer</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/bukti/') . $b->bukti ?>"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="bukti" name="bukti">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <button type="submit" class=" btn btn-primary"><i class="fas fa-save"></i>&nbsp;Simpan</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/donasi.svg" alt="">
                        <br>
                        Silahkan memasukkan nominal donasi, donasi Anda sangat berharga buat kami.
                    </div>

                </div>
            </div>
        </div>




    </div>
    <p>
    <p>
</div>
</div>
<?php else : ?>
<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        <b> Peringantan ! </b>
        <hr>
        Mohon maaf peminjaman Anda tidak dapat di edit karena transaksi doansi ini telah di proses
        Pengurus Yayasan Baiti Jannati.<br>Apabila
        ada kendala silahkan hubungi Pengurus Yayasan Baiti Jannati.
        <br>
        Terima kasih.

    </div>

    <a href="<?php echo base_url("member/transaksi_transfer_manual"); ?>" class="btn btn-primary"> <i
            class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
</div>
</div>
<?php endif ?>

<?php endforeach ?>