<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Donasi</h1>
        <small>
            <div class="text-muted"> Donasi &nbsp; / &nbsp; <a
                    href="<?php echo base_url("member/donasi_manual"); ?>">Tambah
                    Donasi</a>
            </div>
        </small>
    </div>
    <div class="row">

        <div class="col-xl-7 col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Donasi</h6>
                </div>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('member/donasi_manual/index'); ?>"
                        enctype="multipart/form-data">


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
                                placeholder="Masukkan nominal Anda" value="<?= set_value('nominal')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Bank </label>
                            <input type="text" class="form-control" id="bank" name="bank"
                                placeholder="Masukkan nama Bank Anda" value="<?= set_value('bank')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <div class="form-group">
                            <label for="nama">No. Rekening</label>
                            <input type="number" class="form-control" id="no_rekening" name="no_rekening" min="1"
                                placeholder="Masukkan No. Rekening Anda" value="<?= set_value('no_rekening')  ?>">
                            <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label class="" for="bank">Bank Tujuan</label>
                            <div class="input-group">
                                <select name="id_bank" id="id_bank" class="custom-select">
                                    <option value="" selected disabled>Pilih bank</option>
                                    <?php foreach ($bank as $j) : ?>
                                    <option value="<?= $j->id_bank ?>"><?= $j->nama_bank ?> - <?= $j->no_rekening ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('id_bank', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="keterangan">Berdoa di donasi ini</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows="" class="form-control"
                                value="<?= set_value('keterangan')  ?>"> </textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <label for="foto">Foto Bukti Transfer</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="bukti" name="bukti" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>

                        <br>
                        <br>
                        <button type="submit" class=" btn btn-primary"> <i
                                class="fas fa-fw fa-hand-holding-heart"></i>&nbsp;Donasi
                            Sekarang</button>
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