<link rel="icon" href="<?php echo base_url() . 'assets/images/logo.png' ?>">

<body>
    <div class="bg-light">
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Registrasi</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <body class="bg-gradient-primary">
            <link rel="icon" href="<?php echo base_url() . 'assets/images/logo.png' ?>">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary ">Registrasi</h1>
                                        <center><img src="<?= base_url(); ?>assets/images/logo.png" alt="" width="30%">
                                        </center>
                                        <br>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth/registration') ?>">

                                        <!-- <div class="form-group">
                                    <input type="text" class="form-control form-control-user border-left-primary"
                                        id="name" name="name" placeholder="Fullname" value="<?= set_value('name')  ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div> -->

                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user border-left-primary" id="email"
                                                name="email" placeholder="Email" value="<?= set_value('email')  ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class=" form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password"
                                                    class="form-control form-control-user  border-left-primary"
                                                    id="password1" name="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password"
                                                    class="form-control form-control-user  border-left-primary"
                                                    id="password2" name="password2" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Akun
                                        </button>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a href="<?= base_url('auth/forgotPassword'); ?>">Lupa Password
                                            ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('auth'); ?>">Apakah Anda Sudah Punya Akun?
                                            Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>