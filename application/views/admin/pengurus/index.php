<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengurus</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna&nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/pengurus"); ?>">
                    Pengurus</a>
            </div>
        </small>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="card border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Pengurus</h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> <i class="fas fa-fw fa-user-tie"></i>&nbsp;Jumlah Pengurus:
                    <?php echo $this->db->get_where('pengurus')->num_rows() ?></b>
                <hr>
                Laki - Laki&nbsp;(L) :
                <?php echo $this->db->get_where('pengurus', array('jenis_kelamin' => 'L'))->num_rows() ?>
                <br>
                Perempuan&nbsp;(P) :
                <?php echo $this->db->get_where('pengurus', array('jenis_kelamin' => 'P'))->num_rows() ?>
            </li>
            <!-- <li class="list-group-item">Perempuan :

                        </li> -->
        </ul>
    </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data pengurus</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <a class='btn btn-success' href="pengurus/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>

            <p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No</th>
                            <th class="text-primary">Nama</th>
                            <th class="text-primary">Jenis Kelamin</th>
                            <th class="text-primary">Jabatan</th>
                            <th class="text-primary">No. Telp</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengurus as $ad) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ad->nama_pengurus ?></td>
                            <td><?= $ad->jenis_kelamin ?></td>
                            <td><?= $ad->jabatan ?></td>
                            <td><?= $ad->no_telp ?></td>


                            <td>
                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'admin/pengurus/edit/' . $ad->id_pengurus ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/pengurus/hapus/' . $ad->id_pengurus) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('admin/pengurus/excel') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-file-excel"></i>
                    Laporan Excel</a>
                <p>
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