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
            <p style="text-align:center;margin:0;padding:0">Pemasukan Keuangan Donasi</p>
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
                    <th class="text-primary">No</th>
                    <!-- <th class="text-primary">Nama Donatur </th>
                            <th class="text-primary">Penanggung Jawab</th> -->
                    <th class="text-primary">Tanggal</th>
                    <th class="text-primary">Jenis</th>
                    <th class="text-primary">Nominal</th>
                    <th class="text-primary">Detail</th>

                    <!-- <th class="text-primary">Keterangan</th> -->
                    <!-- <th class="text-primary">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                        foreach ($pemasukan_transfer as $j) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <!-- <td><?= $j->name ?></td>
                            <td>--</td> -->
                    <td> <?=  date('d-m-Y H:i:s', strtotime($j->transaction_time)); ?></td>
                    <td style="color : #4169E1"><b>Pemasukan Non Tunai</b></td>
                    <td>Rp. <?= number_format($j->gross_amount, 2, ',', '.'); ?></td>
                    <!-- <td><?= $j->payment_type ?></td>

                            <td><?= $j->bank ?></td> -->
                    <td>Dari
                        <?= $j->name ?>, Transfer Bank <?= $j->bank ?>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php
                                foreach ($pemasukan_tunai as $dnk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <!-- <td><?= $dnk->id_user ?></td>
                            <td><?= $dnk->id_user_pengurus ?></td> -->
                    <td> <?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?></td>
                    <td style="color : #4169E1"><b>Pemasukan Donasi Tunai</b></td>
                    <td>Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                    <td>Dari <?= $dnk->id_user ?>, Penanggung Jawab
                        <?= $dnk->id_user_pengurus ?>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php
                                foreach ($pemasukan_non_donasi as $dnk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <!-- <td></td>
                            <td><?= $dnk->name ?></td> -->
                    <td> <?=  date('d-m-Y H:i:s', strtotime($dnk->created_at)); ?></td>
                    <td style="color : #4169E1"><b>Pemasukan Non Donasi</b></td>
                    <td>Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                    <td>Penanggung Jawab
                        <?= $dnk->name ?>
                    </td>
                </tr>
                <?php endforeach ?>


            </tbody>

            <?php
                    error_reporting(0);
                    foreach ($pemasukan_transfer as $total_masuk) {
                        $nominal_masuk += $total_masuk->gross_amount;
                    }
                    foreach ($pemasukan_non_donasi as $total_non_masuk) {
                        $nominal_non_masuk += $total_non_masuk->nominal;
                    }
                    foreach ($pemasukan_tunai as $total_masuk_tunai) {
                        $nominal_masuk_tunai += $total_masuk_tunai->nominal;
                    }
                    $nominal = $nominal_non_masuk + $nominal_masuk + $nominal_masuk_tunai ;
                    ?>
            <tr>
                <th colspan="4" scope="col">Total Pemasukan Keuangan
                </th>
                <th scope="col">Rp. <?= number_format($nominal, 2, ',', '.'); ?></th>
                <!-- <th scope=" col">&nbsp;</th> -->
            </tr>
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