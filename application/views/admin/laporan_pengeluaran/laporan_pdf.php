<!DOCTYPE html>
<html>


<!-- <head>
    <title></title>
    <h6 style="font-size:3rem;text-align:center;margin:0;padding:0">Baiti Jannati</h6><br>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head> -->
<style type="text/css">
.kop-surat {
    line-height: 50%;
}

table {
    margin: auto;


}
</style>

<body>
    <table>
        <tr>
            <td>
                <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="logo" width=10%>
            </td>
            <td>
                <div class="kop-surat">
                    <center>
                        <a><b>BAITI JANNATI</b></a>
                        <p>
                            <a>Dusun Bakalan 02, Bakalan, Kec. Bululawang, Malang, Jawa Timur 65171</a>
                        <p>
                            <a>Telp : (0341) 341618(0341)</a>
                        <p>
                            <a>Email : baitijannati@gmail.com</a>
                        <p>
                    </center>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <div>


        <b>
            <p style="text-align:center;margin:0;padding:0">Pengeluaran Keuangan Donasi</p>
        </b>
        <center>
            <b>
                <?php echo $title ?> <br>
                <?php echo $subtitle ?> <br>
            </b>
        </center>
        <br>
        <table width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th class="text-primary" style=" text-align: center; ">No</th>
                    <th class="text-primary" style=" text-align: center; ">Penanggung Jawab</th>
                    <th class="text-primary" style=" text-align: center; ">Tgl. Pengeluaran</th>
                    <th class="text-primary" style=" text-align: center; ">Keterangan</th>
                    <th class="text-primary" style=" text-align: center; ">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                        foreach ($filter_pengeluaran_donasi as $dt) : ?>
                <tr>
                    <td style=" text-align: center;"><?= $no++ ?></td>
                    <td style=" text-align: center;"><?= $dt->name ?></td>
                    <td style=" text-align: center;">
                        <?=  date('d-m-Y H:i:s', strtotime($dt->created_at)); ?></td>
                    </td>
                    <td style=" text-align: center;"><?= $dt->keterangan ?></td>
                    <td style=" text-align: center; ">Rp
                        <?= number_format($dt->nominal, 2, ',', '.'); ?></td>

                </tr>

                <?php endforeach ?>

            </tbody>

            <thead>
                <?php
                error_reporting(0);
                foreach ($filter_pengeluaran_donasi as $total_pengeluaran) {
                    $nominal_masuk += $total_pengeluaran->nominal;
                }
                $nominal = $nominal_masuk;
                ?>
                <tr>
                    <th colspan="4" scope="col">Total Pengeluaran</th>
                    <th scope="col">Rp. <?= number_format($nominal, 2, ',', '.'); ?></th>
                    <!-- <th scope="col">&nbsp;</th> -->
                </tr>
            </thead>


        </table>





    </div>
    </div>
</body>

</html>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

<!-- DataTables -->
<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>