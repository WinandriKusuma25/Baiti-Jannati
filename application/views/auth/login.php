<link rel="icon" href="<?php echo base_url() . 'assets/images/logo.png' ?>">

<body>
    <div class="bg-light">
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Login</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-primary">Login</h1>
                                </div>
                                <div class="nav-link">
                                    <?= $this->session->flashdata('message'); ?>
                                    <center><img src="<?= base_url(); ?>assets/images/logo.png" alt="" width="30%">
                                    </center>
                                    <br>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user border-left-primary " id="email"
                                                name="email" placeholder="Email" value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class=" form-group">
                                            <input type="password"
                                                class="form-control form-control-user  border-left-primary"
                                                id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                                <a class="small" href="<?= base_url('beranda'); ?>">Beranda</a>
                                            </div> -->
                                    <div class="text-center">
                                        <a href="<?= base_url('auth/forgotPassword'); ?>">Lupa
                                            Password ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?= base_url('auth/registration'); ?>">Buat akun
                                            baru
                                            !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</body>

<style>
.bg-login-image {
    background-image: url("<?= base_url('assets/images/gambar2.png'); ?>");
    /* background-repeat: no-repeat; */
    /* background-size: 90%; */
}
</style>