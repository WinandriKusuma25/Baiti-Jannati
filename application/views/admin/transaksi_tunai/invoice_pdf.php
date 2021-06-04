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

    .ttd {
        font-size: 15px;
        text-align: right;
        margin-right: 30px;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <center>
                    <img src="<?php echo base_url('assets/images/logo.png') ?>" alt="logo" width=10%>
                </center>
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
    <center>
        <h4>Bukti Penerimaan Donasi Tunai</h4>
    </center>


    <?php foreach ($users as $dt) : ?>
    Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
    <?= $dt->id_user ?>
    <?php endforeach ?>
    <br>
    Penerima&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php foreach ($users as $dt) : ?>
    <?= $dt->id_user_pengurus ?>
    <?php endforeach ?>
    <br>
    <?php foreach ($transaksi_tunai_tgl as $dt) : ?>
    Tgl. Donasi&nbsp;&nbsp;&nbsp;&nbsp;:
    <?=  date('d-m-Y H:i:s', strtotime($dt->tgl_donasi)); ?>
    <?php endforeach ?><br>


    <?php $no = 1;
foreach ($transaksi_tunai as $p) : ?>
    <?php if ($p == 'keuangan') : ?>

    <?php else : ?>

    <br>
    Berikut merupakan Jenis Donasi Keuangan :
    <br>
    <br>

    <table width="100%" cellspacing="0" border="1" height="200px">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Donasi</th>
                <th class="text-primary">Kategori</th>
                <th class="text-primary">Nominal</th>


                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
                        foreach ($transaksi_tunai as $dnk) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <td style=" text-align: center;"><?= $dnk->jenis_donasi ?></td>
                <td style=" text-align: center;"><?= $dnk->nama_kategori ?></td>



                <?php if ($dnk->nominal == 0) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;">Rp
                    <?= number_format($dnk->nominal, 2, ',', '.'); ?></td>
                <?php endif ?>






                <?php if ($dnk->keterangan == null) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                <?php endif ?>
                <?php endforeach ?>

        </tbody>
    </table>



    <?php $no = 1;
foreach ($transaksi_tunai_non as $p) : ?>
    <?php if ($p == 'non keuangan') : ?>

    <?php else : ?>
    Berikut merupakan Jenis Donasi Non Keuangan :
    <br>
    <br>


    <table width="100%" cellspacing="0" border="1" height="200px">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Donasi</th>
                <th class="text-primary">Kategori</th>
                <th class="text-primary">Jumlah</th>
                <th class="text-primary">Bukti</th>
                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
                        foreach ($transaksi_tunai_non as $dnk) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <td style=" text-align: center;"><?= $dnk->jenis_donasi ?></td>
                <td style=" text-align: center;"><?= $dnk->nama_kategori ?></td>






                <?php if ($dnk->jumlah == 0) : ?>
                <td style=" text-align: center;">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"> <?= $dnk->jumlah ?>
                </td>
                <?php endif ?>


                <?php if ($dnk->image == null) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Tidak Perlu</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"> <img
                        src="<?= base_url('assets/images/donasi_non_keuangan/') . $dnk->image ?>" width="15%">
                </td>
                <?php endif ?>


                <?php if ($dnk->keterangan == null) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                <?php endif ?>
                <?php endforeach ?>





                <br>
                <br> <br>
                <div class="ttd">

                    <p>Mengetahui,
                        <?php foreach ($transaksi_tunai_tgl as $dt) : ?>

                        <?=  date('d-m-Y', strtotime($dt->tgl_donasi)); ?>
                        <?php endforeach ?>
                    </p>
                    <br><br><br>
                    <p>...........................................</p>
                    <p>Pengurus Baiti Jannati</p>

                    <?php foreach ($users as $dt) : ?>
                    (<?= $dt->id_user_pengurus ?>)
                    <?php endforeach ?>
                </div>







</body>

</html>

<?php endif ?>
<?php endforeach ?>
<br>

<?php endif ?>
<?php endforeach ?>