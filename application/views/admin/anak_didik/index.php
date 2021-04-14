<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Anak Didik</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/anak_didik"); ?>">Anak Didik</a>
            </div>
        </small>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Rekap Anak Didik</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary">
                    <div class="chart-pie pt-1 pb-1">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor"
                            style="display: block; width: 302px; height: 245px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i>&nbsp; Laki-Laki (L)
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i>&nbsp; Perempuan (P)
                            </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Rekap Data Anak Didik
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body  border-bottom-primary">
                    <i class="fas fa-fw fa-child"></i>&nbsp;Jumlah Anak
                    Didik :
                    <?php echo $this->db->get_where('anak_didik')->num_rows() ?></b>
                    <br>
                    <i class="fas fa-fw fa-caret-right"></i> Laki - Laki&nbsp;(L) :
                    <?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'L'))->num_rows() ?>
                    <br>
                    <i class="fas fa-fw fa-caret-right"></i> Perempuan&nbsp;(P) :
                    <?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'P'))->num_rows() ?>
                    <p>
                        <i class="fas fa-fw fa-bookmark"></i> Berikut Merupakan 3 Anak Didik Terbaru
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-primary">No</th>
                                    <th class="text-primary">Nama</th>
                                    <th class="text-primary">Jenis kelamin</th>
                                    <th class="text-primary">TTL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($anak_didik_limit as $ad) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ad->nama ?></td>
                                    <td><?= $ad->jenis_kelamin ?></td>
                                    <td><?= $ad->tempat_lahir ?>,
                                        <?= date('d F Y', strtotime($ad->tgl_lahir)); ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <body>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data anak didik di Baiti Jannati</h6>
            </div>
            <div class="card-body border-bottom-primary">
                <a class='btn btn-success' href="anak_didik/tambah">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span>
                        Tambah
                    </span>
                </a>
                <p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-primary">No</th>
                                <th class="text-primary">Nama</th>
                                <th class="text-primary">Jenis kelamin</th>
                                <th class="text-primary">TTL</th>
                                <th class="text-primary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($anak_didik as $ad) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ad->nama ?></td>
                                <td><?= $ad->jenis_kelamin ?></td>
                                <td><?= $ad->tempat_lahir ?>,
                                    <?= date('d F Y', strtotime($ad->tgl_lahir)); ?></td>
                                <td>
                                    <a class='btn btn-circle btn-primary'
                                        href='<?= base_url() . 'admin/anak_didik/detail/' . $ad->id_anak_didik ?>'
                                        class='btn  btn-biru'>
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                    </a>

                                    <a class='btn btn-circle btn-warning'
                                        href="<?= base_url() . 'admin/anak_didik/edit/' . $ad->id_anak_didik ?>">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>


                                    <a href="#modalDelete" data-toggle="modal"
                                        onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/anak_didik/hapus/' . $ad->id_anak_didik) ?>')"
                                        class='btn btn-circle btn-danger'>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <a href="<?php echo base_url('admin/anak_didik/excel') ?>"
                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fa fa-file-excel"></i>
                        Unduh Excel</a>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


</body>
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


<script>
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Laki-Laki", "Perempuan"],
        datasets: [{
            data: [
                <?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'L'))->num_rows() ?>,
                <?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'P'))->num_rows() ?>
            ],
            backgroundColor: ['#4e73df', '#1cc88a'],
            hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
</script>