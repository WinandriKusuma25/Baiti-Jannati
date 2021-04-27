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
                                Jumlah Pemasukan Donasi Hari Ini</div>
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
                                Jumlah Keseluruhan Donasi Non Tunai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('transaksi_midtrans', array('status_code' => 200))->num_rows() ?>
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
            <a class='btn btn-primary' href="transaksi_tunai/tambah_coba">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>
                <br>




                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                </button>

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('admin/transaksi_tunai/tambah') ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jumlah Donasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="jumlah_form">Jumlah Donasi</label>
                                    <input type="number" class="form-control" id="jumlah_form" name="jumlah_form"
                                        min="1" value="1">
                                    <?= form_error('jumlah_form', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>



                                <div class=" form-group">
                                    <label for="jenis_donasi">Jenis Donasi</label>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio">
                                            <input <?= set_radio('jenis_donasi', 'keuangan'); ?> value="keuangan"
                                                type="radio" id="keuangan" name="jenis_donasi"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="keuangan">Keuangan</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input <?= set_radio('jenis_donasi', 'non keuangan'); ?>
                                                value="non keuangan" type="radio" id="non keuangan" name="jenis_donasi"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="non keuangan">Non Keuangan</label>
                                        </div>
                                        <?= form_error('jenis_donasi', '<span class="text-danger small">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class='btn btn-primary' href="transaksi_tunai/tambah">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    <span>
                                        Tambah
                                    </span>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

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
                    <input type="date" class="form-control form-control-user  border-left-primary" id="end" name="end"
                        placeholder="End Date" required value="<?php echo $this->session->userdata('endSession') ?>">
                </div>
                <div class="col-sm-3">
                    <label></label>
                    <button type="submit" class=" btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Filter</button>
                    <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-danger"> <i
                            class="fas fa-sync-alt"></i>&nbsp;Reset </a>
                </div>
            </div>
        </form>




        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
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

                            <!-- <a class='btn btn-circle btn-warning'
                                href="<?= base_url() . 'admin/transaksi_tunai/edit/' . $dnk->id_donasi ?>">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>

                            <a href="#modalDelete" data-toggle="modal"
                                onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/transaksi_tunai/hapus/' . $dnk->id_donasi) ?>')"
                                class='btn btn-circle btn-danger'>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a> -->
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



<script src="<?= base_url(); ?>assets/js/sf.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/js/daterangepicker.min.js"></script>
<link href="<?= base_url(); ?>assets/js/daterangepicker.css" rel="stylesheet"> -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->

<!-- Datepicker -->
<!-- <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet"> -->

<!-- 
<script type="text/javascript">
$(function() {
    $('.date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#tanggal').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
            '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                'month').endOf('month')],
            'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
            'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1,
                'year').endOf('year')]
        }
    }, cb);

    cb(start, end);
});
</script> -->