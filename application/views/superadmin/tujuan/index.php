<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tujuan</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; <a
                    href="<?php echo base_url("supersuperadmin/tujuan"); ?>">Tujuan</a>
            </div>
        </small>
    </div>

    <div class="card   shadow border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap tujuan</h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> <i class="fas fa-fw fa-user-tie"></i>&nbsp;Jumlah tujuan:
                    <?php echo $this->db->get_where('tujuan')->num_rows() ?></b>
                <hr>

        </ul>
    </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data tujuan</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <a class='btn btn-success' href="tujuan/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>
            <p>

            <div class="table-responsive">
                <!-- <b>Jumlah tujuan : <?php echo $this->db->get_where('tujuan')->num_rows() ?></b> -->
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <th class="text-primary">Judul</th>
                            <th class="text-primary" width="50px">Deskripsi</th>
                            <th class="text-primary">Tgl. Pembuatan</th>
                            <th class="text-primary">Terakhir di edit</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tujuan as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $j->judul ?></td>
                            <td width="50px"><?= $j->deskripsi ?></td>
                            <td><?=  date('d-m-Y H:i:s', strtotime($j->created_at)); ?></td>

                            <?php if ($j->updated_at == NULL ) : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Belum Pernah</span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <?=  date('d-m-Y H:i:s', strtotime($j->updated_at)); ?>
                            </td>
                            <?php endif ?>
                            </td>



                            <td>
                                <!-- <a class='btn btn-primary'
                                    href='<?= base_url() . 'superadmin/tujuan/detail/' . $j->id_tujuan ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a> -->

                                <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'superadmin/tujuan/edit/' . $j->id_tujuan ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>


                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('superadmin/tujuan/hapus/' . $j->id_tujuan) ?>')"
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