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
        <p style="text-align:center;margin:0;padding:0">Pemasukan Non Keuangan </p>
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
                <th style=" text-align: center;">No</th>
                <th style=" text-align: center;">Penerima</th>
                <th style=" text-align: center;">Nama Donatur</th>
                <th style=" text-align: center;">Tgl Donasi</th>
                <th style=" text-align: center;">Jenis Donasi</th>
                <th style=" text-align: center;">Kategori</th>
                <th style=" text-align: center;">Jumlah</th>
                <th style=" text-align: center;">Bukti</th>
                <th style=" text-align: center;">Keterangan</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
                        foreach ($transaksi_non_keuangan as $dnk) : ?>
            <tr>
                <td style=" text-align: center;"><?= $no++ ?></td>
                <td style=" text-align: center;"><?= $dnk->nama_penanggungjawab?></td>
                <td style=" text-align: center;"><?= $dnk->nama_donatur ?></td>
                <td style=" text-align: center;"><?=  date('d-m-Y H:i:s', strtotime($dnk->tgl_donasi)); ?>
                </td>
                <td style=" text-align: center;"> <?= $dnk->jenis_donasi ?></td>


                <td style=" text-align: center;"><?= $dnk->nama_kategori ?></td>






                <?php if ($dnk->jumlah == 0) : ?>
                <td class="project-state" style=" text-align: center;">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"><?= $dnk->jumlah ?>
                </td>
                <?php endif ?>


                <?php if ($dnk->image == null) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Tidak Perlu</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"> <img
                        src="<?= base_url('assets/images/donasi_non_keuangan/') . $dnk->image ?>" width="10%">
                </td>
                <?php endif ?>


                <?php if ($dnk->keterangan == null) : ?>
                <td class="project-state">
                    <span class="badge badge-danger">Kosong</span>
                </td>
                <?php else : ?>
                <td style=" text-align: center;"><?= $dnk->keterangan ?></td>
                <?php endif ?>


            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>