<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Donasi Tunai</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi&nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/transaksi_tunai"); ?>">
                    Detail Transaksi Donasi Tunai </a>
            </div>
        </small>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data detail transaksi donasi tunai</h6>
        </div>
        <p>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="tm-0 font-weight-bold text-primary">
                        Data Penerima dan Donatur : </div>
                    <div class="h5 mb-0 text-gray-800">
                        <br>
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
                        Tgl. Donasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $dt->tgl_donasi ?>
                        <?php endforeach ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mr-3">
            <div class="tm-0 font-weight-bold text-primary">
                Rincian donasi sebagai berikut : </div>
        </div>
        <div class=" card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No</th>
                            <th class="text-primary">Jenis Donasi</th>
                            <th class="text-primary">Kategori</th>
                            <!-- <th class="text-primary">Nominal</th> -->
                            <th class="text-primary">Jumlah</th>
                            <th class="text-primary" width="300px">Bukti</th>
                            <th class="text-primary">Keterangan</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_tunai as $dnk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dnk->jenis_donasi ?></td>
                            <td><?= $dnk->nama_kategori ?></td>
                            <!-- <td><?= $dnk->nominal ?></td> -->
                            <td><?= $dnk->jumlah ?></td>
                            <td> <img src="<?= base_url('assets/images/donasi_non_keuangan/') . $dnk->image ?>"
                                    class="img-thumbnail" width="20%"></td>
                            <td><?= $dnk->keterangan ?></td>
                            <td>
                                <!-- <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/transaksi_tunai/detail/' . $dnk->id_donasi ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a> -->

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/transaksi_tunai/edit/' . $dnk->id_donasi ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/transaksi_tunai/hapus/' . $dnk->id_donasi) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
                <a href="<?php echo base_url("admin/transaksi_tunai"); ?>" class="btn btn-primary"> <i
                        class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>