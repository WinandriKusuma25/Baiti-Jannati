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
            <div class="row justify-content-center">
                <?php foreach ($pengurus as $ad) : ?>
                <div class="card mr-3 ml-3 mb-3 " style="width: 18rem;">
                    <div class="card-header text-white bg-primary">
                        Daftar Pengurus
                    </div>

                    <ul class="list-group list-group-flush">
                        <div class="text-muted">
                            <li class="list-group-item">Nama : &nbsp;<?= $ad->nama_pengurus ?></li>
                            <li class="list-group-item">Jenis Kelamin: &nbsp;<?= $ad->jenis_kelamin ?></li>
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
                            <div class="card-page">
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
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-md-6 col-lg-5 my-3 wow fadeInUp">
                        <div class="card-page">
                            <h3 class="fw-normal">Get in touch</h3>
                            <form method="POST" class="mt-3">
                                <div class="form-group">
                                    <label for="name" class="fw-medium fg-grey">Fullname</label>
                                    <input type="text" class="form-control" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="fw-medium fg-grey">Email</label>
                                    <input type="text" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="fw-medium fg-grey">Phone(optional)</label>
                                    <input type="number" class="form-control" id="phone">
                                </div>

                                <div class="form-group">
                                    <label for="message" class="fw-medium fg-grey">Message</label>
                                    <textarea rows="6" class="form-control" id="message"></textarea>
                                </div>

                                <p>*Your information will never be shared with any third party.</p>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                <!-- <div class="col-md-6 col-lg-7 my-3 wow fadeInUp">
                        <div class="card-page">
                            <div class="maps-container">
                                <div id="myMap"></div>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.910770534654!2d112.65826975132039!3d-8.11056791016789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6212e176c0a61%3A0x6779fd1e68003fec!2sRumah%20Cerdas%20Yatim%20Piatu%20Baiti%20Jannati!5e0!3m2!1sid!2sid!4v1613019067752!5m2!1sid!2sid"
                                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div> <!-- .bg-light -->
    </div>
</body>
<!-- <script src="<?= base_url(); ?>/assets/user/js/google-maps.js"></script>
<script async defer -->
<!-- src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->