<body>
    <main>
        <!-- <div class="position-realive bg-image"
            style="background-image: url(<?= base_url(); ?>assets/user/img/pattern_1.svg);"> -->
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Detail Berita</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('berita') ?>">Berita</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 py-3">
                        <?php foreach ($berita as $ad) : ?>
                        <article class="blog-single-entry">
                            <div class="post-thumbnail">
                                <img src="<?= base_url('assets/images/berita/') . $ad->foto ?>" alt=""
                                    style="width:600px; height:400px;">
                            </div>
                            <div class="post-date">
                                Tanggal Pembuatan : <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?>
                            </div>
                            <div class="text-primary">
                                <h1 class="post-title"><?= $ad->judul ?></h1>
                            </div>
                            <div class="entry-meta mb-4">
                                <div class="meta-item entry-author">
                                    <div class="text-muted">
                                        <i class="fas fa-user"></i>&nbsp; Penulis : <?= $ad->name ?>
                                    </div>
                                </div>
                                <!-- <div class="meta-item">
                                    <div class="icon">
                                        <span class="mai-pricetags"></span>
                                    </div>
                                    Category:
                                    <a href="#">Business</a>,
                                    <a href="#">Finances</a>
                                </div>
                                <div class="meta-item">
                                    <div class="icon">
                                        <span class="mai-chatbubble-ellipses"></span>
                                    </div>
                                    <a href="#">24 Comments</a>
                                </div> -->
                            </div>
                            <div class="entry-content">
                                <div class="text-muted">
                                    <?= $ad->deskripsi ?>
                                </div>
                            </div>
                            <a href="<?= base_url('berita'); ?>" class="btn btn-primary rounded-pill"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                        </article>

                        <?php endforeach ?>
                    </div>


                    <!-- Sidebar -->
                    <div class="col-lg-4 py-3">
                        <div class="widget-wrap">
                            <h4 class="widget-title text-primary">Berita Terbaru</h4>
                            <hr>
                            <?php foreach ($beritaTerbaru as $ad) : ?>
                            <div class="blog-widget">

                                <div class="blog-img">
                                    <img src="<?= base_url('assets/images/berita/') . $ad->foto ?>" alt=""
                                        style="width:100px; height:100px;">
                                </div>
                                <div class="entry-footer">
                                    <div class="blog-title mb-2"><a
                                            href="<?= base_url() . 'berita/detail/' . $ad->id_berita ?>"><?= $ad->judul ?></a>
                                    </div>
                                    <div class="meta">
                                        <a href="#"><span class="icon-calendar"></span>
                                            <?=  date('d-m-Y H:i:s', strtotime($ad->created_at)); ?></a>
                                    </div>

                                </div>
                            </div>
                            <?php endforeach ?>

                        </div>
                    </div> <!-- end sidebar -->

                </div> <!-- .row -->

            </div>
        </div>
    </main>
</body>