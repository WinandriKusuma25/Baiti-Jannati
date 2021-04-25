<body>
    <div class="page-hero-section bg-image hero-home-2"
        style="background-image: url(<?= base_url(); ?>assets/user/img/bg_hero_2.svg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="badge badge-soft mb-2">Baiti Jannati</div>
                        <h1 class="mb-4 fw-normal">Baiti Jannati</h1>
                        <p class="mb-4">Merupakan salah satu lembaga sosial
                            kemasyarakatan atau panti asuhan yang memiliki tanggung jawab memberikan
                            kesejahteraan jasmani maupun rohani teruntuk bagi <b>anak yatim, piatu dan dhuafa</b>.</p>
                        <a href="<?= base_url('auth'); ?>" class="btn btn-primary rounded-pill">Login</a>
                        <a href="<?= base_url('auth/registration'); ?>"
                            class="btn btn-primary rounded-pill">Registrasi</a>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="img-place shadow floating-animate">
                            <img src="<?= base_url(); ?>assets/user/img/gambar.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="position-realive bg-image"
        style="background-image: url(<?= base_url(); ?>assets/user/img/pattern_1.svg);"> -->
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 py-3 mt-lg-5 wow fadeInUp">
                    <h3 class="mb-4 text-primary">Sejarah Baiti Jannati</h3>
                    <hr>
                    <div class="text-muted">
                        <p class="mb-4" align="justify"> <?php 
                        foreach ($pengaturan as $ad) : ?>
                            <?php echo word_limiter($ad->sejarah,50 ); ?>

                        </p>
                        <a href="<?= base_url('profile') ?>" class="btn btn-primary rounded-pill">
                            <i class="fas fa-eye"></i> Baca
                            Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 py-3">
                    <div class="img-place img-thumbnail  shadow wow zoomIn">
                        <img src="<?= base_url('assets/images/pengaturan/') . $ad->foto ?>  ">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 py-3">
                    <div class="img-place wow zoomIn">
                        <img src="<?= base_url(); ?>assets/user/img/gambar5.png" alt="" width="50px">
                    </div>
                </div>
                <?php endforeach ?>
                <div class="col-lg-6 py-3 mt-lg-5">
                    <center>
                        <h3 class="mb-4 text-primary">Tujuan Baiti Jannati</h3>
                        <hr>
                    </center>

                    <?php  $no = 1;
                        foreach ($tujuan as $ad) :  ?>
                    <div class="iconic-list">
                        <div class="iconic-item wow fadeInUp">
                            <!-- <div class="iconic-md iconic-text bg-primary fg-white rounded-circle">
                                <span><?= $no++ ?></span>
                            </div> -->
                            <div class="iconic-content">
                                <h5><?= $ad->judul ?></h5>
                                <div class="text-muted">
                                    <p class="fs-small"><?= $ad->deskripsi ?></p>
                                </div>
                            </div>
                        </div>


                        <!-- Mencari dan mendapatkan Donatur Tetap maupun Tidak Tetap yang hasilnya akan diberikan sepenuhnya
                        kepada anak yatim / piatu. -->

                        <!-- <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-primary fg-white rounded-circle">
                                <span>2</span>
                            </div>
                            <div class="iconic-content">
                                <h5>Santunan Rutin </h5>
                                <div class="text-muted">
                                    <p class="fs-small">Memberikan santunan secara rutin perbulan kepada anak yatim
                                        /
                                        piatu dari dana para donatur</p>
                                </div>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-primary fg-white rounded-circle">
                                <span>3</span>
                            </div>
                            <div class="iconic-content">
                                <h5>Bimbingan Pendidikan </h5>
                                <div class="text-muted">
                                    <p class="fs-small">Memberikan bimbingan pendidikan dan
                                        ketrampilan secara gratis kepada anak didik rumah cerdas ”BAITI JANNATI”</p>
                                </div>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-primary fg-white rounded-circle">
                                <span>4</span>
                            </div>
                            <div class="iconic-content">
                                <h5>Biaya Pendidikan </h5>
                                <div class="text-muted">
                                    <p class="fs-small">Membantu biaya pendidikan dan
                                        perlengkapan sekolah anak didik mulai dari tingkat TK sampai dengan SMP /
                                        MTs.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text  bg-primary fg-white rounded-circle">
                                <span>5</span>
                            </div>
                            <div class="iconic-content">
                                <h5>Pendanaan </h5>
                                <div class="text-muted">
                                    <p class="fs-small">Mengadakan berbagai kegiatan yang dapat
                                        mendatangkan dana untuk selanjutnya diperuntukkan untuk anak yatim / piatu.
                                    </p>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <?php endforeach ?>

                </div>


                <div class="container">
                    <h3 class="text-center wow fadeIn text-primary">Kegiatan Kami</h3>
                    <hr>
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-10">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4 py-3 wow fadeInLeft">
                                    <div class="card card-body border-0 text-center shadow pt-5">
                                        <div class="svg-icon mx-auto mb-4">
                                            <img src="<?= base_url(); ?>assets/user/img/icons/love.png" width="100px"
                                                alt="">
                                        </div>
                                        <h5 class="fg-gray"><b>Santunan</b></h5>
                                        <div class="text-muted">
                                            <p align="justify" class="fs-small">Santunan yang kami adakan yaitu
                                                setiap 1
                                                bulan
                                                sekali.
                                                Yaitu menyantuni anak
                                                yatim, piatu, dan dhuafa yang ada di Desa Bakalan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                                    <div class="card card-body border-0 text-center shadow pt-5">
                                        <div class="svg-icon mx-auto mb-4">
                                            <img src="<?= base_url(); ?>assets/user/img/icons/love2.png" width="100px"
                                                alt="">
                                        </div>
                                        <h5 class="fg-gray"><b>Bakti Sosial</b></h5>
                                        <div class="text-muted">
                                            <p align="justify" class="fs-small">Melakukan Bakti Sosial bagi warga
                                                yang
                                                mengalami
                                                kesusahan, misalnya
                                                kematian dan warga kurang mampu dan warga yang membutuhkan.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 py-3 wow fadeInRight">
                                    <div class="card card-body border-0 text-center shadow pt-5">
                                        <div class="svg-icon mx-auto mb-4">
                                            <img src="<?= base_url(); ?>assets/user/img/icons/education.png"
                                                width="100px" alt="">
                                        </div>
                                        <h5 class="fg-gray"><b>Beasiswa Pendidikan</b></h5>
                                        <div class="text-muted">
                                            <p align="justify" class="fs-small">Membantu SPP anak didik setiap bulan
                                                yang sudah
                                                sekolah SMP. Meskipun membantunya
                                                tidak penuh 100% tetapi tetap dibantu oleh yayasan. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="page-section bg-image bg-image-overlay-dark"
        style="background-image: url(<?= base_url(); ?>assets/user/img/gambar_baiti.jpg);">
        <div class="container fg-white">
            <div class="row">
                <div class="col-md-8 col-lg-6 offset-lg-1 wow fadeInUp">
                    <h2 class="mb-5 fg-white fw-normal">Kata-Kata Bijak</h2>
                    <?php foreach ($pengaturan as $ad) : ?>
                    <p class="fs-large font-italic"> <?php echo $ad->motivasi; ?></p>
                    <?php endforeach?>
                    <p class="fs-large fg-grey fw-medium mb-5">Baiti Jannati</p>
                    <!-- 
                    <a href="#" class="btn btn-outline-light rounded-pill">Read Stories <span
                            class="mai-chevron-forward"></span></a> -->
                </div>
            </div>
        </div>
    </div>




    <!-- <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 py-3">
                    <div class="iconic-list">
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-content">
                                <h5>Powerful Features</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                <span class="mai-analytics"></span>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-content">
                                <h5>Fully Secured</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="iconic-md iconic-text bg-info fg-white rounded-circle">
                                <span class="mai-checkmark"></span>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-content">
                                <h5>Easy Monitoring</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                                <span class="mai-desktop-outline"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-3 wow zoomIn">
                    <div class="img-place mobile-preview shadow">
                        <img src="<?= base_url(); ?>assets/user/img/app_preview_2.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 py-3">
                    <div class="iconic-list">
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                <span class="mai-speedometer-outline"></span>
                            </div>
                            <div class="iconic-content">
                                <h5>Powerful Features</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-success fg-white rounded-circle">
                                <span class="mai-aperture"></span>
                            </div>
                            <div class="iconic-content">
                                <h5>Fully Secured</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                        </div>
                        <div class="iconic-item wow fadeInUp">
                            <div class="iconic-md iconic-text bg-indigo fg-white rounded-circle">
                                <span class="mai-stats-chart-outline"></span>
                            </div>
                            <div class="iconic-content">
                                <h5>Easy Monitoring</h5>
                                <p class="fs-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                    diam
                                    nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- FAQ -->
    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 py-3 wow fadeInUp">
                    <h3 class="mb-4 text-primary">Cara Berdonasi <br>Baiti Jannati</h3>
                    <p>Cara Berdonasi Pada Baiti Jannati yaitu pengunjung harus melakukan registrasi terlebih dahulu
                        untuk menjadi menjadi member. Setelah itu pengunjung Login dan memilih fitur Tambah Donasi dan
                        memasukkan nominal serta
                        memilih metode pembayaran yang digunakan.</p>

                    <!-- <p class="fg-primary fw-medium">Need more helps?</p>
                    <a href="#" class="btn btn-gradient btn-split-icon rounded-pill">
                        <span class="icon mai-call-outline"></span> Contact Us
                    </a> -->
                </div>
                <div class="col-lg-7 py-3 no-scroll-x">
                    <div class="accordion accordion-gap" id="accordionFAQ">
                        <div class="accordion-item wow fadeInRight">
                            <div class="accordion-trigger" id="headingFour">
                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Ada berapa
                                    jenis Donasi yang tersedia?</button>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordionFAQ">
                                <div class="accordion-content">
                                    <p>Ada 3, yaitu :</p>
                                    <ul>
                                        <li>Keuangan Tunai</li>
                                        <li>Keuangan Non Tunai</li>
                                        <li>Non Keuangan</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInRight">
                            <div class="accordion-trigger" id="headingFive">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse2"
                                    aria-expanded="true" aria-controls="collapse2">Apa bisa Donatur berdonasi tanpa ke
                                    Yayasan?</button>
                            </div>
                            <div id="collapse2" class="collapse show" aria-labelledby="headingFive"
                                data-parent="#accordionFAQ">
                                <div class="accordion-content">
                                    <p>Bisa, karena bisa langsung melalui sistem dan terdapat beberapa metode pembayaran
                                        yang tersedia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInRight">
                            <div class="accordion-trigger" id="headingSix">
                                <button class="btn collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Apakah bisa
                                    Donatur menyembunyikan nama Donatur untuk berdonasi? </button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingSix"
                                data-parent="#accordionFAQ">
                                <div class="accordion-content">
                                    <p>Bisa, Donatur bisa mengubahnya di fitur Edit Profile halaman member, misalnya
                                        bisa diubah menjadi Hamba Allah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section no-scroll">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 wow fadeIn">
                    <div class="img-place">
                        <img src="<?= base_url(); ?>assets/user/img/app_preview_8.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 wow fadeInUp">
                    <h3 class="mb-4 text-primary">Telusuri kami di Instagram</h3>
                    <hr>
                    <div class="text-muted">
                        <p class="mb-4">Penasaran kami di Instagram? Silahkan kunjungi kami</p>
                        <a href="https://www.instagram.com/baitijannatibakalan/" target="_blank"
                            class="btn btn-primary rounded-pill"> <i class="fas fa-eye"></i> Lihat Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>