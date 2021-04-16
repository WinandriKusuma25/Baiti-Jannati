<!DOCTYPE html>
<html><head>
    <title></title>
    <h6 style="font-size:3rem;text-align:center;margin:0;padding:0">Baiti Jannati</h6><br>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <style type="text/css">
    body {
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
    }

    /* Table */
    table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
        font-size: 14px;

    }

    .demo-table {
        border-collapse: collapse;
        font-size: 14px;
    }

    /* .demo-table th,
    .demo-table td {
        border-bottom: 1px solid #e1edff;
        border-left: 1px solid #e1edff;
        padding: 5px 10px;
    }
    .demo-table th,
    .demo-table td:last-child {
        border-right: 1px solid #e1edff;
    }
    .demo-table td:first-child {
        border-top: 1px solid #e1edff;
    }
    .demo-table td:last-child {
        border-bottom: 0;
    } */
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    caption {
        caption-side: top;
        margin-bottom: 10px;
    }

    /* Table Header */
    .demo-table thead th {
        background-color: #508abb;
        color: #FFFFFF;
        border-color: #6ea1cc !important;
        text-transform: uppercase;
    }

    .kop-surat a {
        font-family: Arial, Helvetica, sans-serif;
        line-height: 50%;
        font-size: 15px;
    }

    .ttd {
        font-size: 15px;
        text-align: right;
        margin-right: 30px;
    }

    .styletab,
    .tdtable,
    .thtable {
        border: 1px solid #ddd;
        text-align: left;
    }

    .styletab {
        border-collapse: collapse;
        width: 100%;
    }

    .thtable,
    .tdtable {
        padding: 5px;
    }

    /* Table Body */
    </style>
</head>

<body>

<p style="text-align:center;margin:0;padding:0">Daftar Pengurus</p>
    <p style="text-align:center;margin:0;padding:0">Dusun Bakalan 02, Bakalan, Kec. Bululawang, Malang, Jawa Timur 65171</p>
    <p style="text-align:center;margin:0;padding:0">telp : (0341) 341618(0341)</p>
    <hr>
    <br>
    <div>
    <br>
    <table  align="center"  border="1" >
        <tr >
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>No. HP</th>

        </tr>

        <?php
        $no = 1;
        foreach ($anak_didik as $ad) : ?>

        <tr align="center">
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $ad->nama_pengurus ?></td>
            <td align="center"><?= $ad->jenis_kelamin ?></td>
            <td align="center"><?= $ad->jabatan ?>,
            <td align="center"><?= $ad->no_telp ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
</body></html>