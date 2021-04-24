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


    <div class="alert alert-primary" role="alert">
        <h6 class="alert-heading">Selamat Datang
            <?php foreach ($user as $usr) : ?>
            <?= $usr->name ?>
            <?php endforeach ?>
            di halaman pengurus Baiti Jannati
        </h6>
    </div>

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
                                <?php echo $this->db->get_where('user', array('role' => 'donatur'))->num_rows() ?></div>
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
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Total Pengeluaran Keuangan Donasi Perbulan pada
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
                        <canvas id="myAreaChart" width="669" height="320" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
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
                            <i class="fas fa-circle text-primary"></i> Donasi Keuangan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Donasi Non Keuangan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Pengeluaran Keuangan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Donasi Non Tunai
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
        <div class="col">
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
                            foreach ($pengeluaran_donasi as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></td>
                                </td>
                                <td>Rp<?= number_format($ad->nominal, 2, ',', '.'); ?></td>


                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php
                    error_reporting(0);
                    foreach ($pengeluaran_donasi as $total_keluar) {
                        $nominal_keluar += $total_keluar->nominal;
                    }
                    ?>
                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Total Pengeluaran
                            </th>

                            <th scope="col">
                                <div class="text-danger">Rp. <?= number_format($nominal_keluar, 2, ',', '.'); ?> </div>
                            </th>

                            <!-- <th scope=" col">&nbsp;</th> -->
                        </tr>

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
    </div>


    <div class="row">
        <div class="col">
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
                            foreach ($pemasukan_non_donasi as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td>
                                    <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></td>
                                </td>
                                <td>Rp<?= number_format($ad->nominal, 2, ',', '.'); ?></td>


                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php
                    error_reporting(0);
                    foreach ($pemasukan_non_donasi as $total_masuk) {
                        $nominal_masuk += $total_masuk->nominal;
                    }
                    ?>
                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Total Pemasukan
                            </th>

                            <th scope="col">
                                <div class="text-success">Rp. <?= number_format($nominal_masuk, 2, ',', '.'); ?> </div>
                            </th>

                            <!-- <th scope=" col">&nbsp;</th> -->
                        </tr>

                        <tr>
                            <th colspan="2" scope="col" class="text-primary">Lihat Detail
                            </th>

                            <th scope="col">
                                <a href="<?php echo base_url("admin/pemasukan_non_donasi"); ?>"
                                    class="btn btn-primary right">
                                    <i class="fas fa-eye"></i>&nbsp;Detail</a>

                            </th>

                            <!-- <th scope=" col">&nbsp;</th> -->
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

<!-- <script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito',
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
                label: "Total Transaksi Donasi Tunai",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($tdt); ?>,
            },
            {
                label: "Total Pengeluaran",
                lineTension: 0.3,
                backgroundColor: "rgba(231, 74, 59, 0.05)",
                borderColor: "#e74a3b",
                pointRadius: 3,
                pointBackgroundColor: "#e74a3b",
                pointBorderColor: "#e74a3b",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($pd); ?>,
            }
        ],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: 5
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: true,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
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
            intersect: true,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});
</script> -->

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
<?php endif; ?>