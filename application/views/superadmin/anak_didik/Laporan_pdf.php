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
            <td style=" text-align: center;">
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
            <p style="text-align:center;margin:0;padding:0">Anak Didik</p>
        </b>
        <br>
        <table width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>Nama Wali</th>
                    <th>Penanggung Jawab</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $no = 1;
        foreach ($anak_didik as $ad) : ?>

                <tr align="center">
                    <td align="center"><?php echo $no++ ?></td>
                    <td align="center"><?php echo $ad->nama ?></td>
                    <td align="center"><?= $ad->jenis_kelamin ?></td>
                    <td align="center"><?= $ad->tempat_lahir ?>,
                        <?= date('d F Y', strtotime($ad->tgl_lahir)); ?></td>
                    <td align="center"><?= $ad->alamat ?></td>
                    <td align="center"><?= $ad->nama_wali ?></td>
                    <td align="center"><?= $ad->nama_pengurus ?></td>
                    <td align="center"> <img src="<?= base_url('assets/images/anak_didik/') . $ad->foto ?>"
                            class="card-img" alt="..." width="100px"></td>
                    <!-- <img src="<?php echo base_url('assets/images/anak_didik/$ad->foto') ?>"> -->
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</body>

</html>