<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Donasi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi&nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/transaksi_tunai"); ?>">
                    Transaksi Donasi Tunai </a>
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
                                Jumlah Pemasukan Transaksi Donasi Tunai Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($transaksi_tunai_hari as $dt) : ?>
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
                                <?php foreach ($transaksi_tunai_bulan as $dt) : ?>
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
                                <?php foreach ($transaksi_tunai_tahun as $dt) : ?>
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
                                Jumlah Keseluruhan Transaksi DonasiTunai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('transaksi_donasi_tunai')->num_rows() ?>
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
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data transaksi donasi tunai</h6>
        </div>
        <p>

        <div class=" card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <a class='btn btn-success' href="transaksi_tunai/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>


                <!-- Menampikan Data Filter Tanggal -->
            <form method="post" action="<?= base_url('admin/transaksi_tunai/filter'); ?>">
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
                        <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-danger"> <i
                                class="fas fa-sync-alt"></i>&nbsp;Reset </a>
                    </div>
                </div>
            </form>



            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No</th>
                            <th class="text-primary">Penerima</th>
                            <th class="text-primary">Nama Donatur</th>
                            <th class="text-primary">Tgl Donasi</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_tunai as $dnk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dnk->id_user_pengurus?></td>
                            <td><?= $dnk->id_user ?></td>
                            <!-- <td><?= date('d F Y', strtotime($dnk->tgl_donasi)); ?></td> -->
                            <td><?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?></td>
                            <td>
                                <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/transaksi_tunai/detail/' . $dnk->id_donasi ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-success'
                                    href="<?= base_url() . 'admin/transaksi_tunai/cetak/' . $dnk->id_donasi ?> "
                                    target='_blank'>
                                    <i class="fas fa-print" aria-hidden="true"></i>
                                </a>

                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/transaksi_tunai/hapus/' . $dnk->id_donasi) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <a href="<?php echo base_url('admin/transaksi_tunai/tampilKeuangan') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-eye"></i>
                    Rekap Keuangan Transaksi Donasi Tunai</a>

                <a href="<?php echo base_url('admin/transaksi_tunai/tampilNonKeuangan') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-eye"></i>
                    Rekap Non Keuangan Transaksi Donasi Tunai</a>
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