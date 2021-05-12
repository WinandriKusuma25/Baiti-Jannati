<link rel="icon" href="<?php echo base_url() . 'assets/images/logo.png' ?>">

<body>
    <div class="bg-light">
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Lupa Password</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lupa Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <body class="bg-gradient-primary">
            <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-primary">Lupa Password</h1>
                                            </div>
                                            <?= $this->session->flashdata('message'); ?>
                                            <center><img src="<?= base_url(); ?>assets/images/logo.png" alt=""
                                                    width="30%">
                                            </center>
                                            <br>
                                            <form class="user" method="post"
                                                action="<?= base_url('auth/forgotPassword'); ?>">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-user border-left-primary"
                                                        id="email" name="email" placeholder="Email"
                                                        value="<?= set_value('email') ?>">
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <button type="submit" class="btn btn-primary rounded-pill">
                                                    Reset Password
                                                </button>
                                            </form>
                                            <hr>
                                            <!-- <div class="text-center">
                                                <a class="small" href="<?= base_url('auth'); ?>">Kembali ke login</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>