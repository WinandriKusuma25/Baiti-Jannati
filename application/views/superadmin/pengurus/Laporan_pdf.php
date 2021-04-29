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
            <p style="text-align:center;margin:0;padding:0">Pengurus</p>
        </b>
        <br>

        <table width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th class="text-primary">No</th>
                    <th class="text-primary">Nama</th>
                    <th class="text-primary">Jenis Kelamin</th>
                    <th class="text-primary">Jabatan</th>
                    <th class="text-primary">No. Telp</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                        foreach ($pengurus as $ad) : ?>
                <tr>
                    <td style=" text-align: center;"><?= $no++ ?></td>
                    <td style=" text-align: center;"><?= $ad->nama_pengurus ?></td>
                    <td style=" text-align: center;"><?= $ad->jenis_kelamin ?></td>
                    <td style=" text-align: center;"><?= $ad->jabatan ?></td>
                    <td style=" text-align: center;"><?= $ad->no_telp ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</body>

</html>