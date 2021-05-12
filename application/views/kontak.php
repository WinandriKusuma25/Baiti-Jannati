<body>
    <div class="bg-light">
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Kontak</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container   wow fadeInUp">
            <div class="container mr-12  wow fadeInUp">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="card-page">
                                <h5 class="fg-primary">Kontak Baiti Jannati</h5>
                                <hr>
                                <center>
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="<?= base_url(); ?>assets/images/contact.svg" alt="">
                                </center>
                                <center> Berikut Merupakan Halaman Kontak <b>Baiti
                                        Jannati</b>
                                    <hr width="50%">
                                </center>


                                <div class="row justify-content-center">
                                    <?php foreach ($pengurus as $ad) : ?>
                                    <div class="card mr-3 ml-3 mb-3 " style="width: 18rem;">
                                        <div class="card-header text-white bg-primary">
                                            Daftar Pengurus
                                        </div>

                                        <ul class="list-group list-group-flush">
                                            <div class="text-muted">
                                                <li class="list-group-item">Nama : &nbsp;<?= $ad->nama_pengurus ?></li>
                                                <li class="list-group-item">Jenis Kelamin:
                                                    &nbsp;<?= $ad->jenis_kelamin ?></li>
                                                <li class="list-group-item">Jabatan : &nbsp;<?= $ad->jabatan ?></li>
                                                <li class="list-group-item">No. Telp : &nbsp;<?= $ad->no_telp ?></li>
                                            </div>
                                        </ul>
                                    </div>

                                    <?php endforeach ?>

                                    <div class="container   wow fadeInUp">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10 my-3 wow fadeInUp">
                                                <center><?= $this->pagination->create_links(); ?></center>
                                                <hr>

                                                <?php 
                                                  foreach ($pengaturan as $ad) : ?>

                                                <div class="row row-beam-md">

                                                    <div class="col-md-4 text-center py-3 py-md-2">
                                                        <i class="mai-location-outline h3"></i>
                                                        <p class="fg-primary fw-medium fs-vlarge">Lokasi</p>
                                                        <p class="mb-0"><?= $ad->lokasi ?></p>
                                                    </div>
                                                    <div class="col-md-4 text-center py-3 py-md-2">
                                                        <i class="mai-call-outline h3"></i>
                                                        <p class="fg-primary fw-medium fs-vlarge">Kontak</p>
                                                        <p class="mb-1"><?= $ad->kontak ?></p>
                                                    </div>
                                                    <div class="col-md-4 text-center py-3 py-md-2">
                                                        <i class="mai-mail-open-outline h3"></i>
                                                        <p class="fg-primary fw-medium fs-vlarge">Email</p>
                                                        <p class="mb-1"><?= $ad->email ?></p>
                                                    </div>
                                                </div>

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>



            </div>
        </div> <!-- .bg-light -->
    </div>
</body>