<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengurus</h1>
        <small>
            <div class="text-muted"> Manajemen Pengguna &nbsp;/&nbsp; <a
                    href="<?php echo base_url("superadmin/pengurus"); ?>">Pengurus</a>
            </div>
        </small>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengurus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('user', array('role' => 'admin'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Belum Aktivasi Akun
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('user', array('is_active' => 'pasif'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Sudah Aktivasi Akun
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('user', array('is_active' => 'aktif', 'role' => 'donatur'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data pengurus di Baiti Jannati</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <a class='btn btn-success' href="pengurus_akun/tambah">
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
                            <th class="text-primary">Email</th>
                            <!-- <th class="text-primary">Picture</th> -->
                            <th class="text-primary">Status</th>
                            <th class="text-primary">Terakhir Login</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengurus as $usr) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $usr->name ?></td>
                            <td><?= $usr->email ?></td>
                            <?php if ($usr->is_active == "aktif") : ?>
                            <td class="project-state">
                                <span class="badge badge-success"><?= $usr->is_active ?></span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Belum aktif</span>
                            </td>
                            <?php endif ?>
                            <?php if ($usr->last_login == NULL) : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Belum Pernah Login</span>
                            </td>
                            <?php else : ?>
                            <td>
                                <?=  date('d-m-Y H:i:s', strtotime($usr->last_login)); ?></td>
                            </td>
                            <?php endif ?>

                            <td>
                                <a class='btn btn-primary btn-circle'
                                    href='<?= base_url() . 'superadmin/pengurus_akun/detail/' . $usr->id_user ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'superadmin/pengurus_akun/edit/' . $usr->id_user ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
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
<?php $no = 0;
foreach ($pengurus as $usr) : $no++ ?>
<div class="modal fade" id="modalDetail  <?= $usr->id_user ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $usr->name ?>
            </div>
            <div class="modal-footer">
                <form id="formDetail" action="" method="post">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>