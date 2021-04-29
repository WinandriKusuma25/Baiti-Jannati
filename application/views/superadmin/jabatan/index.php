<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jabatan</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; <a
                    href="<?php echo base_url("superadmin/jabatan"); ?>">Jabatan</a>
            </div>
        </small>
    </div>

    <div class="card   shadow border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Jabatan</h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> <i class="fas fa-fw fa-user-tie"></i>&nbsp;Jumlah Jabatan:
                    <?php echo $this->db->get_where('jabatan')->num_rows() ?></b>
                <hr>

        </ul>
    </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data jabatan</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <a class='btn btn-success' href="jabatan/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>

            <div class="table-responsive">
                <!-- <b>Jumlah Jabatan : <?php echo $this->db->get_where('jabatan')->num_rows() ?></b> -->
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <th class="text-primary">Jabatan</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jabatan as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $j->jabatan ?></td>


                            <td>
                                <!-- <a class='btn btn-primary'
                                    href='<?= base_url() . 'superadmin/jabatan/detail/' . $j->id_jabatan ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a> -->

                                <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'superadmin/jabatan/edit/' . $j->id_jabatan ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>


                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('superadmin/jabatan/hapus/' . $j->id_jabatan) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

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