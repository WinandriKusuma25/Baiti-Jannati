<!-- Begin Page Content -->

<body>
    <div class="bg-light">
        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url(<?= base_url(); ?>assets/user/img/hero_mini.svg);">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Laporan Pemasukan dan Pengeluaran Keuangan</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('laporan') ?>">Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Laporan Pemasukan dan
                                        Pengeluaran Keuangan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content -->

        <div class="container mr-12  wow fadeInUp">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card-page">
                            <h5 class="fg-primary">Laporan Pemasukan dan Pengeluaran Keuangan</h5>
                            <hr>
                            <center>
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="<?= base_url(); ?>assets/images/date.svg" alt="">
                            </center>
                            <center> Berikut Merupakan Halaman Laporan Pemasukan dan Pengeluaran Keuangann <b>Baiti
                                    Jannati</b>
                            </center>
                            <center>
                                <hr width="50%">
                            </center>

                            <br>
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 mb-3" id="tanggalfilter">
                                    <div class="card card-primary shadow-sm">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan
                                                Tanggal</h6>
                                        </div>
                                        <div class="card-body">
                                            <form
                                                action="<?php echo base_url("Laporan_pemasukan_pengeluaran/filter"); ?>"
                                                method="POST" target='_blank'>
                                                <input type="hidden" name="nilaifilter" value="1">
                                                <input name="valnilai" type="hidden">
                                                <div class="form-group">
                                                    <label for="tgl_pemasukan">Tanggal Awal</label>
                                                    <input type="date" class="form-control" name="tanggalawal"
                                                        required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_pemasukan">Tanggal Akhir</label>
                                                    <input type="date" class="form-control" name="tanggalakhir"
                                                        required="">
                                                </div>

                                                <button type="submit" name="submit"
                                                    class="btn btn-primary rounded-pill"><i
                                                        class="fa fa-download"></i>&nbsp;Unduh</button>
                                                <button type="reset" name="reset"
                                                    class="btn btn-danger rounded-pill "><i
                                                        class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 mb-3" id="tahunfilter">
                                    <div class="card card-primary shadow-sm border-bottom-primary ">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan
                                                Tahun</h6>
                                        </div>
                                        <div class="card-body">
                                            <form
                                                action="<?php echo base_url("Laporan_pemasukan_pengeluaran/filter"); ?>"
                                                method="POST" target='_blank'>
                                                <input name="valnilai" type="hidden">
                                                <input type="hidden" name="nilaifilter" value="3">
                                                <div class="form-group">
                                                    <label for="">Pilih Tahun</label>
                                                    <select name="tahun2" required="" class="custom-select">
                                                        <option value="" selected disabled>Pilih Tahun</option>
                                                        <?php foreach ($tahun as $th) : ?>
                                                        <option value="<?php echo $th->tahun ?>">
                                                            <?php echo $th->tahun ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <button type="submit" name="submit"
                                                    class="btn btn-primary rounded-pill"><i
                                                        class="fa fa-download"></i>&nbsp;Unduh</button>
                                                <button type="reset" name="reset"
                                                    class="btn btn-danger rounded-pill "><i
                                                        class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- row  -->
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-xl-6 col-lg-6 mb-3" id="bulanfilter">
                                    <div class="card card-primary shadow-sm border-bottom-primary">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan
                                                Bulan</h6>
                                        </div>
                                        <div class="card-body">
                                            <form
                                                action="<?php echo base_url("Laporan_pemasukan_pengeluaran/filter"); ?>"
                                                method="POST" target='_blank'>
                                                <input type="hidden" name="nilaifilter" value="2">
                                                <input name="valnilai" type="hidden">
                                                <div class="form-group">
                                                    <label for="">Pilih Tahun</label>
                                                    <select name="tahun1" required="" class="custom-select">
                                                        <option value="" selected disabled>Pilih Tahun</option>
                                                        <?php foreach ($tahun as $th) : ?>
                                                        <option value="<?php echo $th->tahun ?>">
                                                            <?php echo $th->tahun ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tgl_pemasukan">Bulan Awal</label>
                                                    <select name="bulanawal" id="bulanawal" class="custom-select"
                                                        required="">
                                                        title="Pilih Bulan">
                                                        <option value="" selected disabled>-Pilih-</option>
                                                        <option value="1">JANUARI</option>
                                                        <option value="2">FEBRUARI</option>
                                                        <option value="3">MARET</option>
                                                        <option value="4">APRIL</option>
                                                        <option value="5">MEI</option>
                                                        <option value="6">JUNI</option>
                                                        <option value="7">JULI</option>
                                                        <option value="8">AGUSTUS</option>
                                                        <option value="9">SEPTEMBER</option>
                                                        <option value="10">OKTOBER</option>
                                                        <option value="11">NOVEMBER</option>
                                                        <option value="12">DESEMBER</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_pemasukan">Bulan Akhir</label>
                                                    <select name="bulanakhir" id="bulanakhir" class="custom-select"
                                                        required="">
                                                        title="Pilih
                                                        Bulan">
                                                        <option value="" selected disabled>-Pilih-</option>
                                                        <option value="1">JANUARI</option>
                                                        <option value="2">FEBRUARI</option>
                                                        <option value="3">MARET</option>
                                                        <option value="4">APRIL</option>
                                                        <option value="5">MEI</option>
                                                        <option value="6">JUNI</option>
                                                        <option value="7">JULI</option>
                                                        <option value="8">AGUSTUS</option>
                                                        <option value="9">SEPTEMBER</option>
                                                        <option value="10">OKTOBER</option>
                                                        <option value="11">NOVEMBER</option>
                                                        <option value="12">DESEMBER</option>
                                                    </select>
                                                </div>

                                                <button type="submit" name="submit"
                                                    class="btn btn-primary rounded-pill"><i
                                                        class="fa fa-download"></i>&nbsp;Unduh</button>
                                                <button type="reset" name="reset"
                                                    class="btn btn-danger rounded-pill "><i
                                                        class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                                                <!-- <a href="<?php echo base_url("user/laporan"); ?>" class="btn btn-primary"> <i
                                          class="fas fa-arrow-left"></i>&nbsp;Kembali </a> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 mb-3">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="<?= base_url(); ?>assets/images/report2.svg" alt="">
                                    <br>
                                    <b>
                                        <center>Transparansi Data Donasi dan Keuangan</center>
                                    </b>
                                </div>
                            </div>



                            <br>
                            <!--card -->
                        </div>
                        <br>

                    </div>
                </div>
            </div>







        </div>

        <!-- section -->

        <!-- /.content-wrapper -->
    </div>


</body>