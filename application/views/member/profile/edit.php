<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
        <small>
            <div class="text-muted"> Profil &nbsp;/&nbsp; Profilku &nbsp; / &nbsp; <a
                    href="<?php echo base_url("member/profile/edit"); ?>">Edit Profil</a>
            </div>
        </small>
    </div>




    <div class="row">





        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
                </div>
                <?php $no = 1;
                foreach ($user as $ad) : ?>
                <div class="card-body  border-bottom-primary">
                    <?= form_open_multipart('member/profile/edit'); ?>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" readonly
                                value="<?= $ad->email; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $ad->name; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role" name="role" readonly
                                value="<?= $ad->role; ?>">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <div class="col-sm-2">Foto</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/images/profile/') . $ad->image ?>"
                                        class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <a href="<?php echo base_url("member/profile"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/profil.svg" alt="">
                    </div>
                    Selamat Datang di halaman edit profil
                    <?php foreach ($user as $usr) : ?>
                    <?= $usr->name ?>, Anda dapat mengubah profil Anda disini.
                    <hr>

                    Baiti Jannati
                    <?php endforeach ?>
                </div>
            </div>
        </div>





    </div>





</div>
</div>