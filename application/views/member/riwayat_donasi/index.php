<!-- Begin Page Content -->
<?php
error_reporting(E_ALL);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Donasi Transfer</h1>
        <small>
            <div class="text-muted">Donasi &nbsp;/&nbsp; <a
                    href="<?php echo base_url("member/riwayat_donasi"); ?>">Riwayat Donasi Transfer</a>
            </div>
        </small>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data riwayat donasi transfer</h6>
        </div>
        <div class="card-body border-bottom-primary">
            <?= $this->session->flashdata('message'); ?>
            <!-- <a class='btn btn-success' href="jabatan/tambah">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a> -->
            <p>

                <!-- <div class="btn-group">
                <a href="<?php echo base_url("member/riwayat_donasi"); ?>"
                    class=" btn btn-primary <?= activate_menu('riwayat_donasi') ?>">Donasi Non
                    Tunai</a>
                <a href="<?php echo base_url("member/riwayat_donasi_tunai"); ?>" class="btn btn-primary">Donasi
                    Tunai</a>
            </div>
            <p> -->

            <div class="table-responsive">
                <!-- Jumlah Jabatan : <?php echo $this->db->get_where('jabatan')->num_rows() ?> -->
                <table class="table table-bordered table-striped text-center" id="dataTable" display nowrap width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <!-- <th class="text-primary">Order Id</th> -->
                            <!-- <th class="text-primary">Nama</th> -->
                            <th class="text-primary">Nominal</th>
                            <th class="text-primary">Tipe Payment</th>
                            <th class="text-primary">Tgl. Transaksi</th>
                            <!-- <th class="text-primary">Bank</th>
                            <th class="text-primary">Va Number</th> -->
                            <th class="text-primary">Status</th>
                            <th class="text-primary">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_midtrans as $j) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= $j->order_id ?></td> -->
                            <!-- <td><?= $j->name ?></td> -->
                            <td>Rp. <?= number_format($j->gross_amount, 2, ',', '.'); ?></td>
                            <td><?= $j->payment_type ?></td>
                            <!-- <td><?= $j->transaction_time ?></td> -->
                            <td><?=  date('d-m-Y H:i:s', strtotime($j->transaction_time)); ?></td>
                            <!-- <?php echo format_indo(date('Y-m-d H:i:s'));?> -->
                            <!-- <td><?= $j->bank ?></td>
                            <td><?= $j->va_number ?></td> -->
                            <?php if ($j->status_code == "200") : ?>
                            <td class="project-state">
                                <span class="badge badge-success">Sukses</span>
                            </td>
                            <?php elseif ($j->status_code == "201") : ?>
                            <td class="project-state">
                                <span class="badge badge-warning">Pending</span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger">Gagal</span>
                            </td>
                            <?php endif ?>



                            <td>
                                <a class=' btn-circle btn-primary'
                                    href='<?= base_url() . 'member/riwayat_donasi/detail/' . $j->order_id ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <!-- <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'member/jabatan/edit/' . $j->order_id ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                


                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/jabatan/hapus/' . $j->order_id) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a> -->

                                <!-- <a href="<?= $j->pdf_url; ?>" target="blank" class='btn btn-success'>Download </a> -->
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



<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        responsive: true
    });

    // new $.fn.dataTable.FixedHeader(table);
});
</script>