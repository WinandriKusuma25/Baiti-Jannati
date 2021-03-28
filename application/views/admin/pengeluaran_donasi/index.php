<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengeluaran Donasi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi&nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/pengeluaran_donasi"); ?>">
                    Pengeluaran Donasi </a>
            </div>
        </small>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengeluaran Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pengeluaran_donasi_hari as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>
                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_hari as $total_pemasukkan) {
                                    $total_hari += $total_pemasukkan->nominal;
                                }
                                ?>

                                Rp. <?= number_format($total_hari, 2, ',', '.'); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengeluaran Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pengeluaran_donasi_bulan as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>
                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_bulan as $total_pemasukkan) {
                                    $total_bulan += $total_pemasukkan->nominal;
                                }
                                ?>

                                Rp. <?= number_format($total_bulan, 2, ',', '.'); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengeluaran Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pengeluaran_donasi_tahun as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>

                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_tahun as $total_pemasukkan) {
                                    $total_tahun += $total_pemasukkan->nominal;
                                }
                                ?>

                                Rp. <?= number_format($total_tahun, 2, ',', '.'); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Keseluruhan Pengeluaran Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('pengeluaran_donasi')->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($nominal_all as $na) : ?>
                                Rp. <?= number_format($na->nominal, 2, ',', '.'); ?>
                                <?php endforeach ?>
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
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data pengeluaran donasi</h6>
        </div>
        <p>



        <div class=" card-body border-bottom-primary">

            <a class='btn btn-success' href="pengeluaran_donasi/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>

                <!-- Menampikan Data Filter Tanggal -->

            <form method="get" action="<?= base_url('admin/pengeluaran_donasi/filter'); ?>">
                <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="text-primary"><b>Filter Data Berdasarkan Tanggal</b></label>
                        <br>
                        <label>Tgl. Mulai</label>
                        <input type="date" class="form-control form-control-user  border-left-primary" id="startdate"
                            name="startdate" placeholder="Start Date">
                        <?= form_error('startdate', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <label></label>
                        <br>
                        <br>
                        <label>Tgl. Akhir</label>
                        <input type="date" class="form-control form-control-user  border-left-primary" id="enddate"
                            name="enddate" placeholder="End Date">
                    </div>
                </div>
                <button type="submit" class=" btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Filter</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No</th>
                            <th class="text-primary">Penanggung Jawab</th>
                            <th class="text-primary">Tgl. Pengeluaran</th>
                            <th class="text-primary">Nominal</th>
                            <!-- <th class="text-primary">Keterangan</th> -->
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengeluaran_donasi as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt->nama_pengurus ?></td>
                            <td><?= date('d F Y', strtotime($dt->tgl_pengeluaran)); ?></td>
                            <td>Rp <?= number_format($dt->nominal, 2, ',', '.'); ?></td>
                            <!-- <td><?= $dt->keterangan ?></td> -->


                            <td>
                                <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/pengeluaran_donasi/detail/' . $dt->id_pengeluaran ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/pengeluaran_donasi/edit/' . $dt->id_pengeluaran ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/pengeluaran_donasi/hapus/' . $dt->id_pengeluaran) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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