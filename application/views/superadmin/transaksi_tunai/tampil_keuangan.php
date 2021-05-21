<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Donasi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi&nbsp;/&nbsp; <a
                    href="<?php echo base_url("superadmin/transaksi_tunai"); ?>">
                    Transaksi Donasi Tunai </a>
            </div>
        </small>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data transaksi donasi tunai</h6>
        </div>
        <p>

        <div class=" card-body border-bottom-primary">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No</th>
                            <th class="text-primary" style=" text-align: center;">Penerima</th>
                            <th class="text-primary" style=" text-align: center;">Nama Donatur</th>
                            <th class="text-primary" style=" text-align: center;">Tgl Donasi</th>
                            <th class="text-primary" style=" text-align: center;">Jenis Donasi</th>
                            <!-- <th class="text-primary">Kategori</th> -->
                            <th class="text-primary" style=" text-align: center;">Nominal</th>
                            <!-- <th class="text-primary">Jumlah</th>
                            <th class="text-primary">Bukti</th> -->
                            <th class="text-primary" style=" text-align: center;">Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_tunai as $dnk) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;"><?= $dnk->id_user_pengurus?></td>
                            <td style=" text-align: center;"><?= $dnk->id_user ?></td>
                            <!-- <td><?= date('d F Y', strtotime($dnk->tgl_donasi)); ?></td> -->
                            <td style=" text-align: center;"><?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?>
                            </td>
                            <td style=" text-align: center;"> <?= $dnk->jenis_donasi ?></td>


                            <!-- <td><?= $dnk->id_kategori ?></td> -->



                            <?php if ($dnk->nominal == 0) : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Kosong</span>
                            </td>
                            <?php else : ?>
                            <td style=" text-align: center;">Rp
                                <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                            <?php endif ?>


                            <!-- <?php if ($dnk->jumlah == 0) : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Kosong</span>
                            </td>
                            <?php else : ?>
                            <td><?= $dnk->jumlah ?>
                            </td>
                            <?php endif ?> -->


                            <!-- <?php if ($dnk->image == null) : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Tidak Perlu</span>
                            </td>
                            <?php else : ?>
                            <td> <img src="<?= base_url('assets/images/donasi_non_keuangan/') . $dnk->image ?>"
                                    class="img-thumbnail" width="50%">
                            </td>
                            <?php endif ?> -->


                            <?php if ($dnk->keterangan == null) : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Kosong</span>
                            </td>
                            <?php else : ?>
                            <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                            <?php endif ?>


                        </tr>
                        <?php endforeach ?>
                    </tbody>

                    <thead>
                        <!-- menampilkan data hari ini -->
                        <?php
                        error_reporting(0);
                        foreach ($nominal_hari as $total_pemasukan) {
                            $total_hari += $total_pemasukan->nominal;
                        }
                        ?>

                        <!-- menampilkan data bulan ini -->
                        <?php
                        error_reporting(0);
                        foreach ($nominal_bulan as $total_pemasukkan) {
                            $total_bulan += $total_pemasukkan->nominal;
                        }
                        ?>

                        <!-- menampilkan data tahun ini -->
                        <?php
                        error_reporting(0);
                        foreach ($nominal_tahun as $total_pemasukkan) {
                            $total_tahun += $total_pemasukkan->nominal;
                        }
                        ?>

                        <!-- total pemasukan -->
                        <?php foreach ($nominal_all as $na) : ?>

                        <?php endforeach ?>


                        <tr>
                            <th colspan="7" style="color : #4169E1">Rekap pemasukan Keuangan Donasi Tunai
                        </tr>

                        <tr>
                            <th colspan="6" style="color : #4169E1">Pemasukan Hari ini
                            </th>
                            <th scope="col" style="color: #1cc88a;">Rp. <?= number_format($total_hari, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" style="color : #4169E1">Pemasukan Bulan ini
                            </th>
                            <th scope="col" style="color:#1cc88a">Rp. <?= number_format($total_bulan, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" style="color : #4169E1">Pemasukan Tahun ini
                            </th>
                            <th scope="col" style="color:#1cc88a">Rp. <?= number_format($total_tahun, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" style="color : #4169E1">Total pemasukan
                            </th>
                            <th scope="col" style="color:#1cc88a"> Rp. <?= number_format($na->nominal, 2, ',', '.'); ?>
                            </th>
                        </tr>
                    </thead>
                </table>



                <a href="<?php echo base_url('superadmin/transaksi_tunai') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-left"></i>
                    Kembali</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>