<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("superadmin/home"); ?>">Beranda</a>
            </div>
        </small>
    </div>

    <div class="alert alert-primary" role="alert">
        <h6 class="alert-heading">Selamat Datang
            <?php foreach ($user as $usr) : ?>
            <?= $usr->name ?>
            <?php endforeach ?>
            di halaman Admin Baiti Jannati
        </h6>
    </div>


    <!-- <div class="card   shadow border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rincian Log Aktivitas Pengurus</h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> <i class="fas fa-fw fa-user-tie"></i>&nbsp;Jumlah Kategori:
                    <?php echo $this->db->get_where('tabel_log')->num_rows() ?></b>
                <hr>
        </ul>
    </div>
    <br> -->
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan log rincian aktivitas pengurus</h6>
        </div>
        <div class="card-body border-bottom-primary">


            <div class="table-responsive">

                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <div class="text-primary"><b>Jumlah Log Aktivitas :
                            <?php echo $this->db->get_where('tabel_log')->num_rows() ?></b></div>
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <th class="text-primary">Log Waktu</th>
                            <th class="text-primary">Log Pengurus</th>
                            <th class="text-primary">Log Tipe</th>
                            <th class="text-primary">Log Deskripsi</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($log as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?=  date('d-m-Y H:i:s', strtotime($j->log_time)); ?></td>
                            <td><?= $j->log_user ?></td>
                            <td><?= $j->log_tipe ?></td>
                            <td><?= $j->log_desc ?></td>
                            <td>
                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('superadmin/home/hapus/' . $j->log_id) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <a href="<?php echo base_url('superadmin/home/excel') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-file-excel"></i>
                    Unduh Excel</a>

                <a href="<?php echo base_url('superadmin/home/database') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-database"></i>
                    Backup Database</a>

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