<body>
    <main>
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Berita</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mr-12  wow fadeInUp">
            <div class="row justify-content-center">
                <?php foreach ($berita as $ad) : ?>
                <div class="card-page  mr-3 mb-3" style="width:340px; height:530px">
                    <center><img src="<?= base_url('assets/images/berita/') . $ad->foto ?>"
                            style="width:270px; height:300px;">
                        <br>

                    </center>

                    <center>
                        <hr width="90%">
                    </center>
                    <div class="text-muted">
                        <center>
                            <small>Tanggal Pembuatan
                                :&nbsp; <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></small>
                            <h6><?= $ad->judul ?></h6>

                            <!-- <b>Penulis</b>&nbsp;: <?= $ad->nama_pengurus ?>
                            <br> -->
                            <br>
                            <a class="btn btn-primary rounded-pill fixed"
                                href='<?= base_url() . 'berita/detail/' . $ad->id_berita ?>'>
                                <i class="fas fa-eye"></i> Baca
                            </a>
                        </center>
                    </div>

                    <center>
                        <br>


                    </center>


                </div>
                <?php endforeach ?>

            </div>
            <center><?= $this->pagination->create_links(); ?></center>
        </div>
        </div>
    </main>
</body>