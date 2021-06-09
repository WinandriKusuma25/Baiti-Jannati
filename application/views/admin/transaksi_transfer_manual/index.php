<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Transfer</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/transaksi_transfer_manual"); ?>">Transaksi Transfer Manual</a>
            </div>
        </small>
    </div>




    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Donasi Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_hari as $dt) : ?>
                                <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Donasi Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_bulan as $dt) : ?>
                                <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Donasi Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_tahun as $dt) : ?>
                                <?= $dt ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Keseluruhan Donasi Transfer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('bank_transfer', array('status' => 'diterima'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data donasi transaksi keuangan transfer</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <!-- <a class='btn btn-success' href="jabatan/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a> -->
            <p>

                <!-- Menampikan Data Filter Tanggal -->
            <form method="post" action="<?= base_url('admin/transaksi_transfer_manual/filter'); ?>">
                <label class="text-primary"><b>Filter Data Berdasarkan Tanggal</b></label>
                <div class=" form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user  border-left-primary" id="start"
                            name="start" placeholder="Start Date" required
                            value="<?php echo $this->session->userdata('startSession') ?>">
                        <?= form_error('startdate', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control form-control-user  border-left-primary" id="end"
                            name="end" placeholder="End Date" required
                            value="<?php echo $this->session->userdata('endSession') ?>">
                    </div>
                    <div class="col-sm-3">
                        <label></label>
                        <button type="submit" class=" btn btn-primary"><i
                                class="fas fa-filter"></i>&nbsp;Filter</button>
                        <a href="<?php echo base_url("admin/transaksi_transfer_manual"); ?>" class="btn btn-danger"> <i
                                class="fas fa-sync-alt"></i>&nbsp;Reset </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No.</th>
                            <th class="text-primary" style=" text-align: center;">Nama</th>
                            <th class="text-primary" style=" text-align: center;">Dari Bank</th>
                            <th class="text-primary" style=" text-align: center;">No.Rekening</th>
                            <th class="text-primary" style=" text-align: center;">Bank Tujuan</th>
                            <th class="text-primary" style=" text-align: center;">Nominal</th>
                            <th class="text-primary" style=" text-align: center;">Bukti</th>
                            <th class="text-primary" style=" text-align: center;">Tgl. Transaksi</th>
                            <th class="text-primary" style=" text-align: center;">Status</th>
                            <th class="text-primary" style=" text-align: center;" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_transfer as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $j->name ?></td>
                            <td><?= $j->bank ?></td>
                            <td><?= $j->norekening ?></td>
                            <td><?= $j->nama_bank ?></td>

                            <td>Rp. <?= number_format($j->nominal, 2, ',', '.'); ?></td>
                            <td><img src="<?= base_url('assets/images/bukti/') . $j->bukti ?>" alt="..."
                                    class="img-thumbnail" width="50%"></td>
                            <td>
                                <?=  date('d-m-Y H:i:s', strtotime($j->created_at)); ?></td>
                            <?php if ($j->status == "diterima") : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Sukses</span>
                            </td>
                            <?php elseif ($j->status == "diproses") : ?>
                            <td class="project-state">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Gagal</span>
                            </td>
                            <?php endif ?>



                            <td style=" text-align: center;">
                                <a class=' btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/transaksi_transfer_manual/detail/' . $j->id_transfer ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/transaksi_transfer_manual/edit/' . $j->id_transfer ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>



                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/transaksi_transfer_manual/hapus/' . $j->id_transfer) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>



                            </td>
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
                            <th colspan="10" style="color : #4169E1">Rekap pemasukan Keuangan Donasi Keuangan Transfer
                                Manual
                        </tr>

                        <tr>
                            <th colspan="8" style="color : #4169E1">Pemasukan Hari ini
                            </th>
                            <th scope="col" colspan="2" style="color: #1cc88a;">Rp.
                                <?= number_format($total_hari, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="8" style="color : #4169E1">Pemasukan Bulan ini
                            </th>
                            <th scope="col" colspan="2" style="color:#1cc88a">Rp.
                                <?= number_format($total_bulan, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="8" style="color : #4169E1">Pemasukan Tahun ini
                            </th>
                            <th scope="col" colspan="2" style="color:#1cc88a">Rp.
                                <?= number_format($total_tahun, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="8" style="color : #4169E1">Total pemasukan
                            </th>
                            <th scope="col" colspan="2" style="color:#1cc88a"> Rp.
                                <?= number_format($na->nominal, 2, ',', '.'); ?>
                            </th>
                        </tr>
                    </thead>
                </table>

                <br>
                <div class="alert alert-primary" role="alert">
                    <p><b>*Catatan :</b>&nbsp;Transaksi di hitung ketika status pembayaran telah sukses dan telah di
                        validasi oleh pengurus </p>
                </div>

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


<!-- Modal -->
<div class="modal fade" id="modalDelete3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-danger"><b>Peringatan !</b></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf Anda tidak dapat menghapus data ini karena transaksi masih berjalan
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-danger"><b>Peringatan !</b></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf Anda tidak dapat menghapus data ini karena transaksi telah berhasil
            </div>
        </div>
    </div>
</div>