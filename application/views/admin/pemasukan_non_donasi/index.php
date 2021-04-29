<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemasukan Non Donasi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi&nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>">
                    Pemasukan Non Donasi </a>
            </div>
        </small>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Non Donasi Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_non_donasi_hari as $dt) : ?>
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
                                Jumlah Pemasukan Non Donasi Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_non_donasi_bulan as $dt) : ?>
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
                                Jumlah Pemasukan Non Donasi Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_non_donasi_tahun as $dt) : ?>
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
                                Jumlah Keseluruhan Pemasukan Non Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('pemasukan_non_donasi')->num_rows() ?>
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
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data pemasukan non donasi</h6>
        </div>
        <div class=" card-body border-bottom-primary">

            <a class='btn btn-success' href="pemasukan_non_donasi/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>
                <!-- Menampikan Data Filter Tanggal -->
            <form method="post" action="<?= base_url('admin/pemasukan_non_donasi/filter'); ?>">
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
                        <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>" class="btn btn-danger"> <i
                                class="fas fa-sync-alt"></i>&nbsp;Reset </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center; ">No</th>
                            <th class="text-primary" style=" text-align: center; ">Penanggung Jawab</th>
                            <th class="text-primary" style=" text-align: center; ">Tgl. Pemasukan</th>
                            <th class="text-primary" style=" text-align: center; ">Nominal</th>
                            <!-- <th class="text-primary" style=" text-align: center; ">Terakhir di edit</th> -->
                            <th class="text-primary">Keterangan</th>
                            <th class="text-primary" style=" text-align: center; ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pemasukan_non_donasi as $dt) : ?>
                        <tr>
                            <td style=" text-align: center;"><?= $no++ ?></td>
                            <td style=" text-align: center;"><?= $dt->name ?></td>
                            <td style=" text-align: center;">
                                <?=  date('d-m-Y H:i:s', strtotime($dt->created_at)); ?></td>
                            </td>


                            <td style=" text-align: center; ">Rp
                                <?= number_format($dt->nominal, 2, ',', '.'); ?></td>

                            <td style=" text-align: center;"><?= $dt->keterangan ?></td>

                            <!-- <?php if ($dt->updated_at == NULL) : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Tidak pernah di edit</span>
                            </td>
                            <?php else : ?>
                            <td>
                                <?=  date('d-m-Y H:i:s', strtotime($dt->updated_at)); ?></td>
                            </td>
                            <?php endif ?> -->

                            <td>
                                <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/pemasukan_non_donasi/detail/' . $dt->id_pemasukan ?>'
                                    class='btn btn-biru'>
                                    <i class=" fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/pemasukan_non_donasi/edit/' . $dt->id_pemasukan ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/pemasukan_non_donasi/hapus/' . $dt->id_pemasukan) ?>')"
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
                            <th colspan="6" style="color : #4169E1">Rekap pemasukan Keuangan Non Donasi
                        </tr>

                        <tr>
                            <th colspan="5" style="color : #4169E1">Pemasukan Hari ini
                            </th>
                            <th scope="col" style="color: #1cc88a;">Rp. <?= number_format($total_hari, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" style="color : #4169E1">Pemasukan Bulan ini
                            </th>
                            <th scope="col" style="color:#1cc88a">Rp. <?= number_format($total_bulan, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" style="color : #4169E1">Pemasukan Tahun ini
                            </th>
                            <th scope="col" style="color:#1cc88a">Rp. <?= number_format($total_tahun, 2, ',', '.'); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5" style="color : #4169E1">Total pemasukan
                            </th>
                            <th scope="col" style="color:#1cc88a"> Rp. <?= number_format($na->nominal, 2, ',', '.'); ?>
                            </th>
                        </tr>
                    </thead>
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