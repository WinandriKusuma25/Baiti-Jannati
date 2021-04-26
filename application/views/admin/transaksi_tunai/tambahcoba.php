<script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
<link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pemasukan Donasi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Donasi Tunai &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/penngeluaran_donasi/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemasukan Donasi Tunai</h6>
                </div>

                <div class="card-body border-bottom-primary">
                    <form method="post" action="<?= base_url('admin/transaksi_tunai/tambah_coba'); ?>"
                        enctype="multipart/form-data">

                        <div class="text-primary">
                            <h5><b>Data Penerima dan Donatur</b></h5>
                        </div>
                        <hr>
                        <?php foreach ($user as $b) : ?>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="text">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="name" name="name" readonly
                                    value="<?= $b->name; ?>">
                            </div>

                            <div class="form-group col-6">
                                <label class="" for="user">Nama Donatur</label>
                                <div class="input-group" style="margin-bottom: 10px">
                                    <select name="id_user" id="id_user"
                                        class="js-example-placeholder-multiple js-states form-control"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Donatur</option>
                                        <?php foreach ($users as $p) : ?>
                                        <option value="<?= $p->id_user?>"><?= $p->name ?> | <?= $p->email ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <?php endforeach ?>

                        <div class="text-primary">
                            <h5><b>Waktu Transaksi</b></h5>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Tgl. Transaksi </label>
                                <input type="text" name="tgl_penjualan" value="<?= date('d/m/Y') ?>" readonly
                                    class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Jam Transaksi</label>
                                <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly
                                    class="form-control">
                            </div>
                        </div>

                        <div class="text-primary">
                            <h5><b>Donasi Non Keuangan</b></h5>
                        </div>
                        <hr>
                        <div class="form-row">

                            <div class="form-group col-6">
                                <label>Jenis Donasi </label>
                                <input type="text" name="tgl_penjualan" value="Non Keuangan" readonly
                                    class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label for="id_kategori">Kategori</label>

                                <div class="input-group">
                                    <select name="id_kategori" id="id_kategori" class="custom-select">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <?php foreach ($kategori as $p) : ?>
                                        <option value="<?= $p->id_kategori?>"><?= $p->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" href="<?= base_url('admin/kategori/tambah'); ?>"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group col-3">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" value="" class="form-control" min="1">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class=" form-group col-6">
                                <label for="foto">Bukti</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" autofocus>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <!-- <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                </div>
                            </div>

                            <div class=" form-group col-5">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="keterangan-nk" cols="50" rows="" class="form-control"
                                    value="<?= set_value('keterangan')  ?>"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" id="tambah-non-keuangan"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>

                        <div class="text-primary">
                            <h5><b>Donasi Keuangan</b></h5>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Jenis Donasi </label>
                                <input type="text" id="jenis_keuangan" value="Keuangan" readonly
                                    class="form-control keuangan">
                            </div>

                            <div class="form-group col-3">
                                <label>Nominal</label>
                                <input type="number" id="nominal" value="" class="form-control" min="1">
                            </div>

                            <div class=" form-group col-5">
                                <label for="keterangan">keterangan</label>
                                <textarea id="keterangan-k" cols="50" rows="" class="form-control"
                                    value="<?= set_value('keterangan')  ?>"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-primary btn-block" id="tambah-keuangan"><i
                                        class="fa fa-plus"></i></button>
                            </div>

                        </div>


                        <div class="keranjang">
                            <div class="text-primary">
                                <h5><b>Detail Transaksi Donasi</b></h5>
                            </div>
                            <hr>
                            <table class="table table-bordered" id="table-donasi">
                                <thead>
                                    <tr>
                                        <td width="5%">No</td>
                                        <td width="15%">Jenis Donasi</td>
                                        <td width="15%">Kategori</td>
                                        <td width="15%">Nominal</td>
                                        <td width="10%">Jumlah</td>
                                        <td width="10%">Bukti</td>
                                        <td width="10%">Keterangan</td>
                                        <td width="10%">Aksi</td>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>




                        <p>
                        <p>

                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <button type="reset" name="reset" class="btn btn-dark "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("admin/pengeluaran_donasi"); ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
</div>

<!-- <script>
CKEDITOR.replace('keterangan');
</script> -->


<script>
// inisialisasi nilai variabel data untuk penampungan sementara
var dataDonasi = new Array();

/**
 * 
 *  To Do List 
 *  1. Ambil event berdasarkan button
 *  2. Ambil nilai dari masing" komponen
 *  3. Memasukkan ke dalam tabel dengan menggunakan variabel array()
 *  4. Eksekusi insert atau mengirim data ke controller | POST | GET
 * */

// @TODO 1 : Ambil event
$('#tambah-keuangan').on('click', function() {

    // @TODO 2 : Ambil nilai dari masing" komponen 
    let $jenis = $('#jenis_keuangan').val();
    let $nominal = $('#nominal').val();
    let $keterangan = $('#keterangan-k').val();

    let kondisiValidasi = 0;

    // cek dari masing" nilai
    if ($nominal.length > 0) {

        kondisiValidasi++;
    } else {

        $('#nominal').css('border', '1px solid red');
    }


    if (kondisiValidasi == 1) {

        // membuat objek
        let dataKeuangan = {


            jenis_donasi: $jenis,
            id_kategori: "<?php echo $id_kategori_uang->id_kategori ?>",
            kategori: "<?php echo $id_kategori_uang->nama_kategori ?>",
            nominal: $nominal,
            jumlah: 0,
            image: "",
            keterangan: $keterangan
        };

        // push data penyimpanan
        dataDonasi.push(dataKeuangan);


        // clear all component
        $('#jenis_keuangan').val("Keuangan");
        $('#nominal').val(null);
        $('#keterangan-k').val(null);

    } else {

        alert("Kolom belum diisi");
    }


    // panggil fungsi output 
    showDataDonasi();
})



// hapus
$('#table-donasi tbody').on('click', '#hapus-donasi', function() {

    let index = $(this).data('index');

    let dataTR = $('#data-tr-' + index);
    dataTR.fadeOut(function() {

        this.remove();

        // remove data index dataDonasi
        dataDonasi.splice(index, 1);

        // reload data
        showDataDonasi();
    });

    // alert("Hapus index ke - " + index);
});


function showDataDonasi() {

    // console.log( dataDonasi );

    var elementHTML = "";

    // apabila data donasi memiliki nilai atau isi
    if (dataDonasi.length > 0) {

        dataDonasi.forEach(function(item, index) {

            elementHTML += '<tr id="data-tr-' + index + '">' +
                '<td>' + (parseInt(index) + 1) + '</td>' +
                '<td>' + item.jenis_donasi + ' <input type="hidden" name="jenis[]" value="' + item
                .jenis_donasi + '"/></td>' +
                '<td>' + item.kategori + ' <input type="hidden" name="kategori[]" value="' + item.id_kategori +
                '"> </td>' +
                '<td>' + item.nominal + ' <input type="hidden" name="nominal[]" value="' + item.nominal +
                '"> </td>' +
                '<td>' + item.jumlah + ' <input type="hidden" name="jumlah[]" value="' + item.jumlah +
                '"> </td>' +
                '<td>' + item.image + ' <input type="hidden" name="image[]" value="' + item.image + '"></td>' +
                '<td>' + item.keterangan + ' <input type="hidden" name="keterangan[]" value="' + item
                .keterangan + '"></td>' +
                '<td><a href="javascript:void(0)" id="hapus-donasi" data-index="' + index +
                '" class="btn btn-danger btn-sm">Hapus</a></td>' +
                '</tr>';
        });


    } else {

        alert("Mohon ditambahkan salah satu Non keuangan / Keuangan");
    }
    // buat element baris
    $('#table-donasi tbody').html(elementHTML).hide().fadeIn();

}
</script>


<script>
$(".js-example-placeholder-multiple ").select2({
    placeholder: "  Pilih Donatur"
});
</script>

<script>
$(".js-example-placeholder-multiple2 ").select2({
    placeholder: "  Pilih Katgeori"
});
</script>