<body>
    <main>
        <!-- <div class="position-realive bg-image"
            style="background-image: url(<?= base_url(); ?>assets/user/img/pattern_2.svg);"> -->
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Anak Didik</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Anak Didik</li>
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
                                <h5 class="fg-primary">Daftar Anak Didik Baiti Jannati</h5>
                                <hr>
                                <center>
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="<?= base_url(); ?>assets/images/background.svg" alt="">
                                </center>
                                <center> Berikut Merupakan Halaman Anak Didik <b>Baiti
                                        Jannati</b>
                                </center>
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 my-3 wow fadeInUp">

                                        <div class="row row-beam-md">
                                            <div class="col-md-4 text-center py-3 py-md-2">
                                                <img src="<?= base_url(); ?>assets/images/anak_didik/all.png" alt=""
                                                    width="40%">
                                                <p class="fg-primary fw-medium fs-vlarge">Jumlah</p>
                                                <div class="text-primary">
                                                    <h3><?php echo $this->db->get_where('anak_didik')->num_rows() ?>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center py-3 py-md-2">
                                                <img src="<?= base_url(); ?>assets/images/anak_didik/laki.png" alt=""
                                                    width="40%">
                                                <p class="fg-primary fw-medium fs-vlarge">Laki-laki</p>
                                                <div class="text-primary">
                                                    <h3><?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'L'))->num_rows() ?>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center py-3 py-md-2">
                                                <img src="<?= base_url(); ?>assets/images/anak_didik/cewek.png" alt=""
                                                    width="40%">
                                                <p class="fg-primary fw-medium fs-vlarge">Perempuan</p>
                                                <div class="text-primary">
                                                    <h3><?php echo $this->db->get_where('anak_didik', array('jenis_kelamin' => 'P'))->num_rows() ?>
                                                    </h3>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <!-- <div class=" d-flex flex-wrap"> -->
                        <?php foreach ($anak_didik as $ad) : ?>
                        <div class="card-page mr-3 ml-3 mb-3 " style="width:340px; height:500px">
                            <!-- <div class="card-header  text-white bg-primary ">
                            <b>Daftar Anak Didik</b>
                        </div> -->
                            <center><img src="<?= base_url('assets/images/anak_didik/') . $ad->foto ?>"
                                    style="width:240px; height:250px;">
                                <br>

                            </center>
                            <center>
                                <hr width="90%">
                            </center>
                            <div class="text-muted">

                                &nbsp; &nbsp;<b>Nama</b> :&nbsp;<?= $ad->nama ?>
                                <br>
                                &nbsp; &nbsp;<b>Nama Wali</b> :&nbsp;<?= $ad->nama_wali ?>
                                <br>
                                &nbsp; &nbsp;<b>Jenis Kelamin</b> :&nbsp;<?= $ad->jenis_kelamin ?>
                                <br>
                                &nbsp; &nbsp;<b>TTL</b>
                                : &nbsp;<?= $ad->tempat_lahir ?>,<?= date('d F Y', strtotime($ad->tgl_lahir)); ?>
                                <br>
                                &nbsp; &nbsp;<b>Alamat</b> :&nbsp;<?= $ad->alamat ?>
                                <br>
                                &nbsp; &nbsp;<b>Penanggung Jawab</b>&nbsp;:&nbsp; <?= $ad->nama_pengurus ?>
                                &nbsp;
                                <br>
                            </div>
                        </div>
                        <?php endforeach ?>

                    </div>
                    <br>

                </div>
                <?= $this->pagination->create_links(); ?>

            </div>



        </div>
    </main>
</body>