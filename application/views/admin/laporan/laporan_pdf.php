<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
    .kop-surat {
        line-height: 50%;
    }

    table {
        margin: auto;
    }
    </style>
</head>

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



    <b>
        <p style="text-align:center;margin:0;padding:0">Pemasukan Keuangan </p>
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
                <th class="text-primary">Tanggal</th>
                <th class="text-primary">Jenis</th>
                <th class="text-primary">Keterangan</th>
                <th class="text-primary">Detail</th>
                <th class="text-primary">Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
                        foreach ($pemasukan_transfer as $j) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <!-- <td><?= $j->name ?></td>
                            <td>--</td> -->
                <td style=" text-align: center;"> <?=  date('d-m-Y H:i:s', strtotime($j->transaction_time)); ?></td>
                <td style=" text-align: center;"><b>Pemasukan Transfer</b></td>
                <td style=" text-align: center;"><?= $j->keterangan ?></td>
                <td style=" text-align: center;">Dari
                    <?= $j->name ?>, Transfer Bank <?= $j->bank ?>
                </td>
                <td style=" text-align: center;">Rp. <?= number_format($j->gross_amount, 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach ?>
            <?php foreach ($pemasukan_tunai as $dnk) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <!-- <td><?= $dnk->id_user ?></td>
                            <td><?= $dnk->id_user_pengurus ?></td> -->
                <td style=" text-align: center;"> <?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?></td>
                <td style=" text-align: center;"><b>Pemasukan Donasi Tunai</b></td>
                <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                <td style=" text-align: center;"> Dari <?= $dnk->nama_donatur ?>, Penanggung Jawab
                    <?= $dnk->nama_penanggungjawab ?>
                </td>
                <td style=" text-align: center;">Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach ?>
            <?php
                                foreach ($pemasukan_non_donasi as $dnk) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <td style=" text-align: center;"> <?=  date('d-m-Y H:i:s', strtotime($dnk->created_at)); ?></td>
                <td style=" text-align: center;"><b>Pemasukan Non Donasi</b></td>
                <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                <td style=" text-align: center;">Penanggung Jawab
                    <?= $dnk->name ?>
                </td>
                <td style=" text-align: center;">Rp <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach ?>
            <?php 
                        foreach ($pengeluaran_donasi as $dt) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <td style=" text-align: center;">
                    <?=  date('d-m-Y H:i:s', strtotime($dt->created_at)); ?></td>
                </td>
                <td style=" text-align: center;"><b>Pengeluaran Keuangan</b></td>
                <td style=" text-align: center;"><?= $dt->keterangan ?></td>
                <td style=" text-align: center;">Penanggung Jawab
                    <?= $dnk->name ?>
                </td>
                <td style=" text-align: center; ">Rp
                    <?= number_format($dt->nominal, 2, ',', '.'); ?></td>
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
                    foreach ($pengeluaran_donasi as $total_keluar) {
                        $nominal_keluar += $total_keluar->nominal;
                    }
                    $nominal = $nominal_non_masuk + $nominal_masuk + $nominal_masuk_tunai - $nominal_keluar ;
                    ?>
        <tr>
            <th colspan="5" scope="col">Total Pemasukan Transfer
            </th>
            <th scope="col">Rp. <?= number_format($nominal_masuk, 2, ',', '.'); ?></th>

        </tr>
        <tr>
            <th colspan="5" scope="col">Total Pemasukan Non Donasi
            </th>
            <th scope="col">Rp. <?= number_format($nominal_non_masuk, 2, ',', '.'); ?></th>
        </tr>
        <tr>
            <th colspan="5" scope="col">Total Pemasukan Tunai
            </th>
            <th scope="col">Rp. <?= number_format($nominal_masuk_tunai, 2, ',', '.'); ?></th>
        </tr>
        <tr>
            <th colspan="5" scope="col">Total Pengeluaran
            </th>
            <th scope="col">Rp. <?= number_format($nominal_keluar, 2, ',', '.'); ?></th>
        </tr>
        <tr>
            <th colspan="5" scope="col">Saldo Keuangan
            </th>
            <th scope="col">Rp. <?= number_format($nominal, 2, ',', '.'); ?></th>

        </tr>
    </table>

</body>

</html>