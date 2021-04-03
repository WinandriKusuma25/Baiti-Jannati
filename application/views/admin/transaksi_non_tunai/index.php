<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Non Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/riwayat_donasi"); ?>">Transaksi Non Tunai</a>
            </div>
        </small>
    </div>

    <div class="row">


        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pemasukan Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_hari as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>
                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_hari as $total_pemasukkan) {
                                    $total_hari += $total_pemasukkan->gross_amount;
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
                                Jumlah Pemasukan Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_bulan as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>
                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_bulan as $total_pemasukkan) {
                                    $total_bulan += $total_pemasukkan->gross_amount;
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
                                Jumlah Pemasukan Tahun Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($pemasukan_donasi_tahun as $dt) : ?>
                                Total : <?= $dt ?>
                                <?php endforeach ?>

                                <br>
                                <?php
                                error_reporting(0);
                                foreach ($nominal_tahun as $total_pemasukkan) {
                                    $total_tahun += $total_pemasukkan->gross_amount;
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


        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemasukan Transaksi Non Tunai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($nominal_all as $na) : ?>
                                Rp. <?= number_format($na->gross_amount, 2, ',', '.'); ?>
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
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data donasi transaksi non tunai</h6>
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

            <div class="table-responsive">
                <!-- Jumlah Jabatan : <?php echo $this->db->get_where('jabatan')->num_rows() ?> -->
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <!-- <th class="text-primary">Order Id</th> -->
                            <th class="text-primary">Nama</th>
                            <th class="text-primary">Nominal</th>
                            <th class="text-primary">Tipe Payment</th>
                            <th class="text-primary">Tgl. Transaksi</th>
                            <th class="text-primary">Bank</th>
                            <th class="text-primary">Va Number</th>
                            <th class="text-primary">Status</th>
                            <th class="text-primary">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_midtrans as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= $j->order_id ?></td> -->
                            <td><?= $j->name ?></td>
                            <td>Rp. <?= number_format($j->gross_amount, 2, ',', '.'); ?></td>
                            <td><?= $j->payment_type ?></td>
                            <td><?= $j->transaction_time ?></td>
                            <td><?= $j->bank ?></td>
                            <td><?= $j->va_number ?></td>
                            <?php if ($j->status_code == "200") : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Sukses</span>
                            </td>
                            <?php elseif ($j->status_code == "201") : ?>
                            <td class="project-state">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Gagal</span>
                            </td>
                            <?php endif ?>



                            <td>
                                <a class=' btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/transaksi_non_tunai/detail/' . $j->order_id ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <!-- <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'admin/jabatan/edit/' . $j->order_id ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                


                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/jabatan/hapus/' . $j->order_id) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a> -->

                                <!-- <a href="<?= $j->pdf_url; ?>" target="blank" class='btn btn-success'>Download </a> -->
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