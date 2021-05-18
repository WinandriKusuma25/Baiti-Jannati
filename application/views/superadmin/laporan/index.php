<!-- Begin Page Content -->
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Pemasukan dan Pengeluaran Keuangan</h1>
        <small>
            <div class="text-muted"> Manajemen Laporan &nbsp;/&nbsp; <a
                    href="<?php echo base_url("superadmin/laporan"); ?>">Laporan Pemasukan dan Pengeluaran Keuangan</a>
            </div>
        </small>
    </div>


    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/date.svg" alt="">
                    </div>
                    <center>
                        Berikut Merupakan Halaman Manajemen Laporan pada bagian <b>Cetak Pemasukan dan Pengeluaran
                            Keuangan
                        </b>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data rekap laporan Pemasukan Keuangan</h6>
        </div>
        <div class=" card-body border-bottom-primary">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No</th>
                            <th class="text-primary" style=" text-align: center;">Tanggal</th>
                            <th class="text-primary" style=" text-align: center;">Jenis</th>
                            <th class="text-primary" style=" text-align: center;">Keterangan</th>
                            <th class="text-primary" style=" text-align: center;">Detail</th>
                            <th class="text-primary" style=" text-align: center;" width="20%">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pemasukan_transfer as $j) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;">
                                <?=  date('d-m-Y H:i:s', strtotime($j->transaction_time)); ?></td>
                            <td style="color : #1cc88a"><b>Pemasukan Non Tunai</b></td>
                            <td style=" text-align: center;"><?= $j->keterangan ?></td>
                            <td style=" text-align: center;">Dari
                                <?= $j->name ?>, Transfer Bank <?= $j->bank ?>
                            </td>
                            <td style=" text-align: center;">Rp. <?= number_format($j->gross_amount, 2, ',', '.'); ?>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        <?php
                        foreach ($pemasukan_tunai as $dnk) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;"> <?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?>
                            </td>
                            <td style="color : #1cc88a" style=" text-align: center;"><b>Pemasukan Donasi Tunai</b></td>
                            <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                            <td style=" text-align: center;"> Dari <?= $dnk->id_user ?>, Penerima
                                <?= $dnk->id_user_pengurus ?>
                            </td>
                            <td style=" text-align: center;">Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach ?>

                        <?php
                                foreach ($pemasukan_non_donasi as $dnk) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;"> <?=  date('d-m-Y H:i:s', strtotime($dnk->created_at)); ?>
                            </td>
                            <td style="color : #1cc88a" style=" text-align: center;"><b>Pemasukan Non Donasi</b></td>
                            <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                            <td style=" text-align: center;"> Penanggung Jawab
                                <?= $dnk->name ?>
                            </td>
                            <td style=" text-align: center;">Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php 
                        foreach ($pengeluaran_donasi as $dt) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;">
                                <?=  date('d-m-Y H:i:s', strtotime($dt->created_at)); ?></td>
                            </td>
                            <td style="color : #e74a3b"><b>Pengeluaran Keuangan</b></td>
                            <td style=" text-align: center;"><?= $dt->keterangan ?></td>
                            <td>Penanggung Jawab
                                <?= $dnk->name ?>
                            </td>
                            <td style=" text-align: center; ">Rp
                                <?= number_format($dt->nominal, 2, ',', '.'); ?></td>
                            <?php endforeach ?>


                    </tbody>

                    <?php
                    error_reporting(0);
                    foreach ($pemasukan_transfer as $total_masuk) {
                        $nominal_masuk += $total_masuk->gross_amount;
                    }
                    foreach ($pemasukan_non_donasi as $total_non_masuk) {
                        $nominal_non_masuk += $total_non_masuk->nominal;
                    }
                    foreach ($pemasukan_tunai as $total_masuk_tunai) {
                        $nominal_masuk_tunai += $total_masuk_tunai->nominal;
                    }
                    foreach ($pengeluaran_donasi as $total_keluar) {
                        $nominal_keluar += $total_keluar->nominal;
                    }
                    $nominal = $nominal_non_masuk + $nominal_masuk + $nominal_masuk_tunai - $nominal_keluar ;
                    ?>
                    <tr>
                        <th colspan="5" scope="col" style="color : #1cc88a">Total Pemasukan Transfer
                        </th>
                        <th scope="col">Rp. <?= number_format($nominal_masuk, 2, ',', '.'); ?></th>

                    </tr>
                    <tr>
                        <th colspan="5" scope="col" style="color : #1cc88a">Total Pemasukan Non Donasi
                        </th>
                        <th scope="col">Rp. <?= number_format($nominal_non_masuk, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="5" scope="col" style="color : #1cc88a">Total Pemasukan Tunai
                        </th>
                        <th scope="col">Rp. <?= number_format($nominal_masuk_tunai, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="5" scope="col" style="color : #e74a3b">Total Pengeluaran
                        </th>
                        <th scope="col">Rp. <?= number_format($nominal_keluar, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="5" scope="col" style="color : #4e73df">Saldo Keuangan
                        </th>
                        <th scope="col">Rp. <?= number_format($nominal, 2, ',', '.'); ?></th>

                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!--Content -->
    <div class="content" id="tanggalfilter">

        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tanggal</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("superadmin/laporan/filter"); ?>" method="POST"
                            target='_blank'>
                            <input type="hidden" name="nilaifilter" value="1">
                            <input name="valnilai" type="hidden">
                            <div class="form-group">
                                <label for="tgl_pemasukan">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggalawal" required="">
                            </div>
                            <div class="form-group">
                                <label for="tgl_pemasukan">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggalakhir" required="">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i
                                    class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <br>


    <div class="content" id="bulanfilter">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Bulan</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("superadmin/laporan/filter"); ?>" method="POST"
                            target='_blank'>
                            <input type="hidden" name="nilaifilter" value="2">
                            <input name="valnilai" type="hidden">
                            <div class="form-group">
                                <label for="">Pilih Tahun</label>
                                <select name="tahun1" required="" class="custom-select">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $th) : ?>
                                    <option value="<?php echo $th->tahun ?>">
                                        <?php echo $th->tahun ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_pemasukan">Bulan Awal</label>
                                <select name="bulanawal" id="bulanawal" class="custom-select" required="">
                                    title="Pilih Bulan">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pemasukan">Bulan Akhir</label>
                                <select name="bulanakhir" id="bulanakhir" class="custom-select" required="">
                                    title="Pilih
                                    Bulan">
                                    <option value="" selected disabled>-Pilih-</option>
                                    <option value="1">JANUARI</option>
                                    <option value="2">FEBRUARI</option>
                                    <option value="3">MARET</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MEI</option>
                                    <option value="6">JUNI</option>
                                    <option value="7">JULI</option>
                                    <option value="8">AGUSTUS</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i
                                    class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                            <!-- <a href="<?php echo base_url("user/laporan"); ?>" class="btn btn-primary"> <i
                                          class="fas fa-arrow-left"></i>&nbsp;Kembali </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->

    <!--Content -->
    <p>
    <div class="content" id="tahunfilter">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="card card-primary shadow-sm border-bottom-primary">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tahun</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("superadmin/laporan/filter"); ?>" method="POST"
                            target='_blank'>
                            <input name="valnilai" type="hidden">
                            <input type="hidden" name="nilaifilter" value="3">
                            <div class="form-group">
                                <label for="">Pilih Tahun</label>
                                <select name="tahun2" required="" class="custom-select">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php foreach ($tahun as $th) : ?>
                                    <option value="<?php echo $th->tahun ?>">
                                        <?php echo $th->tahun ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary"><i
                                    class="fa fa-print"></i>&nbsp;Cetak</button>
                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
</div>
<br>