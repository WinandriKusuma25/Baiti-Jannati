    <body>
        <main class="bg-light">
            <div class="page-hero-section bg-image hero-mini"
                style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
                <div class="hero-caption">
                    <div class="container fg-white h-100">
                        <div class="row justify-content-center align-items-center text-center h-100">
                            <div class="col-lg-6">
                                <h3 class="mb-4 fw-medium">Profil</h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section pt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card-page">
                                <h5 class="fg-primary">Sejarah Baiti Jannati</h5>
                                <hr>
                                <?php 
                        foreach ($pengaturan as $ad) : ?>
                                <p align="justify">
                                <?= $ad->sejarah ?>
                                </p>
                                <?php endforeach ?>
                            </div>
                            <br>
                            <div class="card-page">
                                <h5 class="fg-primary">Kondisi Anak Didik</h5>
                                <hr>
                                <p align="justify"> Ketika mulai didirikan dan memberikan santunan anak yatim untuk
                                    pertama kalinya pada tanggal 21 Januari 2018 ada 11 anak yatim / piatu yang
                                    menjadi
                                    prioritas penerima santunan dari Rumah Cerdas ”BAITI JANNATI”,
                                    selanjutnya pada bulan ke-2 (18 Pebruari 2018) jumlah anak didik bertambah 3
                                    menjadi
                                    14 anak didik,
                                    dan pada santunan ke-3 (11 Maret 2018) jumlah anak didik bertambah 1 sehingga
                                    menjadi 15 anak didik.
                                    Pada santunan ke-4 (22 April 2018) jumlah anak didik menjadi 21 anak dan pada
                                    santunan ke-5
                                    (13 Mei 2018) menjadi 31 anak didik dan mulai santunan ke-6 (2 Juni 2018)
                                    smenjadi
                                    33 anak didik,
                                    Santunan ke 8 menjadi 40 anak didik, santunan ke 10 sampai sekarang sudah
                                    berkembang
                                    45 anak didik
                                    (per 22 Mei 2019) </p>

                                <!-- Video -->
                                <div class="text-center py-5">
                                    <img src="<?= base_url(); ?>assets/user/img/gambar_baiti.jpg" alt="" width="70%">
                                </div>

                                <p align="justify">Yayasan ini bernama : YAYASAN RUMAH CERDAS YATIM PIATU BAITI
                                    JANNATI,
                                    selanjutnya dalam anggaran dasar ini disingkat Yayasan, yang berkedudukan di
                                    Dusun Bakalan 02 RT. 01 RW. 03 Desa Bakalan Kecamatan Bululawang
                                    Kabupaten Malang. Dalam perkembangannya, Yayasan dapat membuka kantor cabang
                                    atau
                                    perwakilan lain, baik didalam maupun diluar wilayah
                                    Republik Indonesia berdasarkan Keputusan Pengurus dengan Persetujuan Pembina.
                                </p>
                            </div>

                            <!-- <div class="card-page mt-3">
                                <h5 class="fg-primary">Tim Utama Kami</h5>
                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Sandi Cahyadi</h5>
                                            <span class="fg-gray fs-small">Pembina/Pendiri</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Bayu Eko Dewantoro</h5>
                                            <span class="fg-gray fs-small">Ketua Umum</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_3.png" alt="">
                                            </div>
                                            <h5 class="team-name">M Mas'udi Faris</h5>
                                            <span class="fg-gray fs-small">Ketua Harian</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Sholichah Kaslan</h5>
                                            <span class="fg-gray fs-small">Pengawas</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Tantra Dharmakerti P</h5>
                                            <span class="fg-gray fs-small">Sekretaris 1</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_2.png" alt="">
                                            </div>
                                            <h5 class="team-name">M Misbaqul Ulum</h5>
                                            <span class="fg-gray fs-small">Sekretaris 2</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Nurul Amaliyah</h5>
                                            <span class="fg-gray fs-small">Bendahara 1</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 py-3">
                                        <div class="team-item">
                                            <div class="team-avatar">
                                                <img src="<?= base_url(); ?>assets/user/img/person/person_1.png" alt="">
                                            </div>
                                            <h5 class="team-name">Anggita Wilda</h5>
                                            <span class="fg-gray fs-small">Bendahara 2</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->



                            <div class="card-page mt-3">
                                <h5 class="fg-primary">Mitra Berbagi</h5>
                                <hr>

                                <div
                                    class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center align-items-center mt-5">
                                    <div class="p-3 wow zoomIn">
                                        <div class="img-place client-img">
                                            <img src="<?= base_url(); ?>assets/user/img/clients/M14-01.png" alt="">
                                        </div>
                                    </div>
                                    <div class="p-3 wow zoomIn">
                                        <div class="img-place client-img">
                                            <img src="<?= base_url(); ?>assets/user/img/clients/M3-01.png" alt="">
                                        </div>
                                    </div>
                                    <div class="p-3 wow zoomIn">
                                        <div class="img-place client-img">
                                            <img src="<?= base_url(); ?>assets/user/img/clients/M8-01.png" alt="">
                                        </div>
                                    </div>
                                    <div class="p-3 wow zoomIn">
                                        <div class="img-place client-img">
                                            <img src="<?= base_url(); ?>assets/user/img/clients/M15-01.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main> <!-- .bg-light -->
    </body>