<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Donasi</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/laporan"); ?>">Laporan</a>
            </div>
        </small>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Form Laporan
                    </h4>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open(); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="transaksi">Laporan Donasi</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input value="donasi_keuangan" type="radio" id="donasi_keuangan" name="transaksi"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="donasi_keuangan">Donasi Keuangan</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input value="donasi_non_keuangan" type="radio" id="donasi_non_keuangan"
                                    name="transaksi" class="custom-control-input">
                                <label class="custom-control-label" for="donasi_non_keuangan">Donasi Non
                                    Keuangan</label>
                            </div>
                            <?= form_error('transaksi', '<span class="text-danger small">', '</span>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-3 text-lg-right" for="tanggal">Tanggal</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input value="<?= set_value('tanggal'); ?>" name="tanggal" id="tanggal" type="text"
                                    class="form-control" placeholder="Periode Tanggal">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                                </div>
                            </div>
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-9 offset-lg-3">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-print"></i>
                                </span>
                                <span class="text">
                                    Cetak
                                </span>
                            </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>



<!-- Datepicker -->
<script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">
<!-- Datepicker -->
<link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">


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
</script>