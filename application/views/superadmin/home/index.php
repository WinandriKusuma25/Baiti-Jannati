<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("superadmin/home"); ?>">Beranda</a>
            </div>
        </small>
    </div>




    <?php
                    error_reporting(0);
                    foreach ($transaksi_midtrans_hitung as $total_masuk) {
                        $nominal_masuk += $total_masuk->gross_amount;
                    }
                    foreach ($pengeluaran_donasi_hitung as $total_keluar) {
                        $nominal_keluar += $total_keluar->nominal;
                    }
                    foreach ($pemasukan_non_donasi_hitung as $total_non_masuk) {
                        $nominal_non_masuk += $total_non_masuk->nominal;
                    }
                    foreach ($transaksi_tunai_hitung as $total_masuk_tunai) {
                        $nominal_masuk_tunai += $total_masuk_tunai->nominal;
                    }
                    $nominal = $nominal_masuk_tunai + $nominal_non_masuk + $nominal_masuk - $nominal_keluar;
                    ?>


    <div class="row">
        <div class="col">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/dashboard.svg" alt="">
                    </div>
                    <div class="alert alert-primary" role="alert">
                        <center>
                            <h6 class="alert-heading">Selamat Datang
                                <?php foreach ($user as $usr) : ?>
                                <b><?= $usr->name ?></b>
                                <?php endforeach ?>
                                di halaman Admin <b>Baiti Jannati</b>
                        </center>
                        </h6>
                        <hr>
                        <h1 class="alert-heading">
                            <center>Sisa Saldo Keuangan <b>Rp. <?= number_format($nominal, 2, ',', '.'); ?></b>
                            </center>
                        </h1>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Anak Didik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('anak_didik')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url("superadmin/anak_didik"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Donatur</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('user', array('role' => 'donatur'))->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("superadmin/users"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('berita')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("superadmin/berita"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengurus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('pengurus')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("superadmin/pengurus"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>
    </div>



    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Keuangan Non Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('pemasukan_non_donasi')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url("superadmin/pemasukan_non_donasi"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Donasi Transfer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('transaksi_midtrans', array('status_code' => 200))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("admin/transaksi_non_tunai"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Donasi Tunai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('detail_donasi_tunai')->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengeluaran Keuangan Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('pengeluaran_donasi')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-funnel-dollar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>


    </div>

    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan log rincian aktivitas pengurus</h6>
        </div>
        <div class="card-body border-bottom-primary">


            <div class="table-responsive">

                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <div class="text-primary"><b>Jumlah Log Aktivitas :
                            <?php echo $this->db->get_where('tabel_log')->num_rows() ?></b></div>
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <th class="text-primary">Log Waktu</th>
                            <th class="text-primary">Log Pengurus</th>
                            <th class="text-primary">Log Tipe</th>
                            <th class="text-primary">Log Deskripsi</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($log as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=  date('d-m-Y H:i:s', strtotime($j->log_time)); ?></td>
                            <td><?= $j->log_user ?></td>
                            <td><?= $j->log_tipe ?></td>
                            <td><?= $j->log_desc ?></td>
                            <td>
                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('superadmin/home/hapus/' . $j->log_id) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <a href="<?php echo base_url('superadmin/home/excel') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-file-excel"></i>
                    Unduh Excel</a>

                <a href="<?php echo base_url('superadmin/home/database') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-database"></i>
                    Backup Database</a>

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