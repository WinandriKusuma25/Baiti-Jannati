<!-- Begin Page Content -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("admin/home"); ?>">
                    Beranda </a>
            </div>
        </small>
    </div>






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
                    foreach ($transaksi_manual_hitung as $total_masuk_manual) {
                        $nominal_masuk_manual += $total_masuk_manual->nominal;
                    }
                    $nominal = $nominal_masuk_tunai + $nominal_non_masuk + $nominal_masuk + $nominal_masuk_manual - $nominal_keluar;
                    ?>


                    <div class="alert alert-primary" role="alert">
                        <center>
                            <h6 class="alert-heading">Selamat Datang Pengurus
                                <?php foreach ($user as $usr) : ?>
                                <b><?= $usr->name ?></b>
                                <?php endforeach ?>
                                di halaman pengurus <b>Baiti Jannati</b>
                            </h6>
                        </center>
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



    <!-- <div class="alert alert-primary" role="alert">
        <h6 class="alert-heading">Selamat Datang
            <?php foreach ($user as $usr) : ?>
            <?= $usr->name ?>
            <?php endforeach ?>
            di halaman pengurus Baiti Jannati
        </h6>
    </div> -->

    <!-- menghitung saldo -->


    <!-- <p class="section-lead">Berikut merupakan rekap donasi tunai </p> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pemasukan Keuangan Non Donasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('pemasukan_non_donasi')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>" class="btn btn-primary"> <i
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
                                <?php echo $this->db->get_where('user', array('role' => 'donatur'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('kategori')->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url("admin/kategori"); ?>" class="btn btn-primary"> <i
                        class="fas fa-fw fa-eye"></i>&nbsp;Detail </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Grafik Pengeluaran Keuangan Donasi Perbulan pada
                        Tahun
                        <?= date('Y'); ?>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart" width="669" height="450" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Grafik Pemasukan Non Donasi Perbulan pada
                        Tahun
                        <?= date('Y'); ?>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart2" width="669" height="450" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Grafik Pemasukan Keuangan Transfer Donasi Perbulan pada
                        Tahun
                        <?= date('Y'); ?>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart3" width="669" height="450" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Grafik Pemasukan Keuangan Donasi Tunai Perbulan pada
                        Tahun
                        <?= date('Y'); ?>
                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart4" width="669" height="450" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <!-- Pie Chart -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Rekap Pemasukan Dan Pengeluaran</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
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
                            <i class="fas fa-circle text-primary"></i> Donasi Keuangan Tunai
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Donasi Non Keuangan Tunai
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Pengeluaran Keuangan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Donasi Transfer
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Pemasukan Non Donasi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">5 Pengeluaran Keuangan Donasi Terbaru
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-primary">Penanggung Jawab</th>
                                <th class="text-primary">Tgl.Pengeluaran</th>
                                <th class="text-primary">Nominal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengeluaran_donasi_limit as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></td>
                                </td>
                                <td>Rp<?= number_format($ad->nominal, 2, ',', '.'); ?></td>


                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- total pengeluaran -->
                        <!-- <?php foreach ($pengeluaran_donasi_limit as $na) : ?>

                        <?php endforeach ?> -->
                        <!-- <tr>
                            <th colspan="2" scope="col" class="text-primary">Total Pengeluaran
                            </th>

                            <th scope="col">
                                <div class="text-danger"> Rp. <?= number_format($na->nominal, 2, ',', '.'); ?>
                                </div>
                            </th>

                        </tr> -->

                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Lihat Detail
                            </th>

                            <th scope="col">
                                <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>"
                                    class="btn btn-primary right">
                                    <i class="fas fa-eye"></i>&nbsp;Detail</a>

                            </th>

                            <!-- <th scope=" col">&nbsp;</th> -->
                        </tr>
                    </table>

                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">5 Pemasukan Keuangan Non Donasi Terbaru
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-primary">Penanggung Jawab</th>
                                <th class="text-primary">Tgl.Pemasukan</th>
                                <th class="text-primary">Nominal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pemasukan_non_donasi_limit as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></td>
                                </td>
                                <td>Rp<?= number_format($ad->nominal, 2, ',', '.'); ?></td>


                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Lihat Detail
                            </th>

                            <th scope="col">
                                <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>"
                                    class="btn btn-primary right">
                                    <i class="fas fa-eye"></i>&nbsp;Detail</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">5 Pemasukan Keuangan Donasi Transfer
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-primary">Nama Donatur</th>
                                <th class="text-primary">Tgl.Pemasukan</th>
                                <th class="text-primary">Nominal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pemasukan_transfer_limit as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->transaction_time)); ?></td>
                                </td>
                                <td>Rp<?= number_format($ad->gross_amount, 2, ',', '.'); ?></td>


                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Lihat Detail
                            </th>

                            <th scope="col">
                                <a href="<?php echo base_url("admin/transaksi_non_tunai"); ?>"
                                    class="btn btn-primary right">
                                    <i class="fas fa-eye"></i>&nbsp;Detail</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">5 Pemasukan Keuangan Donasi Transfer
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-primary">Nama Donatur</th>
                                <th class="text-primary">Tgl.Pemasukan</th>
                                <th class="text-primary">Jenis Donasi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pemasukan_tunai_limit as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->id_user ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->tgl_donasi)); ?></td>
                                </td>
                                <td><?= $ad->jenis_donasi ?></td>



                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Lihat Detail
                            </th>

                            <th scope="col">
                                <a href="<?php echo base_url("admin/transaksi_tunai"); ?>"
                                    class="btn btn-primary right">
                                    <i class="fas fa-eye"></i>&nbsp;Detail</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>
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
        labels: ["Donasi Keuangan", "Donasi Non Keuangan", "Pengeluaran Donasi", "Donasi Non Tunai",
            "Pemasukan Non Donasi"
        ],
        datasets: [{
            data: [
                <?php echo $this->db->get_where('detail_donasi_tunai', array('jenis_donasi' => 'keuangan'))->num_rows() ?>,
                <?php echo $this->db->get_where('detail_donasi_tunai', array('jenis_donasi' => 'non keuangan'))->num_rows() ?>,
                <?php echo $this->db->get_where('pengeluaran_donasi')->num_rows() ?>,
                <?php echo $this->db->get_where('transaksi_midtrans', array('status_code' => 200))->num_rows() ?>,
                <?php echo $this->db->get_where('pemasukan_non_donasi')->num_rows() ?>,

            ],
            backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b', '#36b9cc', '#f6c23e'],
            hoverBackgroundColor: ['#5a5c69', '#5a5c69', '#5a5c69', '#5a5c69', '#5a5c69'],
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

<!-- Chart -->

<?php if ($this->uri->segment(2) == 'home') : ?>
<!-- Chart -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<script>
var ctx = document.getElementById('myAreaChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        labels: [
            <?php foreach ($month as $m) :
                        echo "'" . substr($m['month'], 0, 3) . "', "; ?>
            <?php endforeach ?>


        ],

        datasets: [{
            label: "Pengeluaran Donasi",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
                <?php
                        foreach ($chart as $value) {
                            echo "'" . $value['revenue'] . "', ";
                        }
                        ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: true
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false
                }
            }],
        },
    },
    legend: {
        display: true
    },
    tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        caretPadding: 10,
    }
});
</script>



<!-- Pemasukan Non Donasi -->
<script>
var ctx = document.getElementById('myAreaChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        labels: [
            <?php foreach ($month_pemasukan_non_donasi as $m) :
                        echo "'" . substr($m['month'], 0, 3) . "', "; ?>
            <?php endforeach ?>


        ],

        datasets: [{
            label: "Pemasukan Non Donasi",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
                <?php
                        foreach ($chart_pemasukan_non_donasi as $value) {
                            echo "'" . $value['revenue'] . "', ";
                        }
                        ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: true
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false
                }
            }],
        },
    },
    legend: {
        display: true
    },
    tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        caretPadding: 10,
    }
});
</script>


<!-- Pemasukan Transfer -->
<script>
var ctx = document.getElementById('myAreaChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        labels: [
            <?php foreach ($month_transfer as $m) :
                        echo "'" . substr($m['month'], 0, 3) . "', "; ?>
            <?php endforeach ?>


        ],

        datasets: [{
            label: "Pemasukan Donasi Transfer",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
                <?php
                        foreach ($chart_transfer as $value) {
                            echo "'" . $value['revenue'] . "', ";
                        }
                        ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: true
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false
                }
            }],
        },
    },
    legend: {
        display: true
    },
    tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        caretPadding: 10,
    }
});
</script>

<!-- Pemasukan Tunai -->
<script>
var ctx = document.getElementById('myAreaChart4').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        labels: [
            <?php foreach ($month_tunai as $m) :
                        echo "'" . substr($m['month'], 0, 3) . "', "; ?>
            <?php endforeach ?>


        ],

        datasets: [{
            label: "Pemasukan Donasi Tunai",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [
                <?php
                        foreach ($chart_tunai as $value) {
                            echo "'" . $value['revenue'] . "', ";
                        }
                        ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: true
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false
                }
            }],
        },
    },
    legend: {
        display: true
    },
    tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        caretPadding: 10,
    }
});
</script>
<?php endif; ?>