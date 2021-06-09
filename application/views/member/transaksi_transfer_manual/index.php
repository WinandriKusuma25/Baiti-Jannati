<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Transfer</h1>
        <small>
            <div class="text-muted">Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("member/transaksi_transfer_manual"); ?>">Transaksi Transfer Manual</a>
            </div>
        </small>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data donasi transaksi keuangan transfer</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary" style=" text-align: center;">No.</th>
                            <th class="text-primary" style=" text-align: center;">Nama</th>
                            <th class="text-primary" style=" text-align: center;">Dari Bank</th>
                            <th class="text-primary" style=" text-align: center;">No.Rekening</th>
                            <th class="text-primary" style=" text-align: center;">Bank Tujuan</th>
                            <th class="text-primary" style=" text-align: center;">Nominal</th>
                            <th class="text-primary" style=" text-align: center;">Bukti</th>
                            <th class="text-primary" style=" text-align: center;">Tgl. Transaksi</th>
                            <th class="text-primary" style=" text-align: center;">Status</th>
                            <th class="text-primary" style=" text-align: center;" width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_transfer as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $j->name ?></td>
                            <td><?= $j->bank ?></td>
                            <td><?= $j->norekening ?></td>
                            <td><?= $j->nama_bank ?></td>

                            <td>Rp. <?= number_format($j->nominal, 2, ',', '.'); ?></td>
                            <td><img src="<?= base_url('assets/images/bukti/') . $j->bukti ?>" alt="..."
                                    class="img-thumbnail" width="50%"></td>
                            <td>
                                <?=  date('d-m-Y H:i:s', strtotime($j->created_at)); ?></td>
                            <?php if ($j->status == "diterima") : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Sukses</span>
                            </td>
                            <?php elseif ($j->status == "diproses") : ?>
                            <td class="project-state">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Gagal</span>
                            </td>
                            <?php endif ?>



                            <td style=" text-align: center;">
                                <a class=' btn-circle btn-primary'
                                    href='<?= base_url() . 'member/transaksi_transfer_manual/detail/' . $j->id_transfer ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-circle btn-warning'
                                    href="<?= base_url() . 'member/transaksi_transfer_manual/edit/' . $j->id_transfer ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>


                                <?php if ($j->status == "diterima") : ?>
                                <a href="#modalDelete2" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/transaksi_transfer_manual/hapus/' . $j->id_transfer) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <?php else : ?>
                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/transaksi_transfer_manual/hapus/' . $j->id_transfer) ?>')"
                                    class='btn btn-circle btn-danger'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                                <?php endif ?>

                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>


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



<!-- Modal -->
<div class="modal fade" id="modalDelete2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-danger"><b>Peringatan !</b></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf Anda tidak dapat menghapus data ini karena transaksi telah berhasil telah sukses.
            </div>
        </div>
    </div>
</div>