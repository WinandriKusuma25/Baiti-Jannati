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

            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
            </div>

            <!-- Menampikan Data Filter Tanggal -->

            <form method="get" action="<?= base_url('admin/donasi_non_keuangan/filter'); ?>">
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
                            <td><?= $dnk->nama_pengurus ?></td>
                            <td><?= $dnk->name ?></td>
                            <!-- <td><?= date('d F Y', strtotime($dnk->tgl_donasi)); ?></td> -->
                            <td><?= $dnk->tgl_donasi ?></td>
                            <td>
                                <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/transaksi_tunai/detail/' . $dnk->id_donasi ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/transaksi_tunai/edit/' . $dnk->id_donasi ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
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