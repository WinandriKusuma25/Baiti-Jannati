<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>
        <small>
            <div class="text-muted"> Manajemen Donasi &nbsp;/&nbsp; Kategori &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/kategori/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-md-8 py-3">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form edit data kategori</h6>
                </div>

                <?php foreach ($kategori as $j) : ?>
                <div class="card-body border-bottom-primary">
                    <form method="post" action="">
                        <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $j->id_kategori; ?>">

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                value="<?= $j->nama_kategori; ?>">
                            <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <a href="<?php echo base_url("admin/kategori"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                    </form>
                </div>
            </div>
            <br>
        </div>
        <br>
    </div>
    <br>
</div>
</div>