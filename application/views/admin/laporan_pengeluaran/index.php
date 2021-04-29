  <!-- Begin Page Content -->
  <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
  <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"> Manajemen Laporan</h1>
          <small>
              <div class="text-muted"><a href="<?php echo base_url("admin/laporan_pengeluaran"); ?>">
                      Laporan Pengeluaran </a>
              </div>
          </small>
      </div>

      <div class="row">
          <div class="col-xl-12 col-lg-12">
              <div class="card shadow border-bottom-primary">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                      <div class="text-center">
                          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                              src="<?= base_url(); ?>assets/images/date.svg" alt="">
                      </div>
                      <center> Berikut Merupakan Halaman Manajemen Laporan pada bagian <b>Cetak Pengeluaran Keuangan
                              Donasi</b>
                      </center>
                  </div>
              </div>
          </div>
      </div>
      <br>

      <!--Content -->
      <div class="content" id="tanggalfilter">

          <div class="row justify-content-center">

              <div class="col-xl-8 col-lg-8">
                  <div class="card card-primary shadow-sm border-bottom-primary">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tanggal</h6>
                      </div>
                      <div class="card-body">
                          <form action="<?php echo base_url("admin/laporan_pengeluaran/filter"); ?>" method="POST"
                              target='_blank'>
                              <input type="hidden" name="nilaifilter" value="1">
                              <input name="valnilai" type="hidden">
                              <div class="form-group">
                                  <label for="tgl_pemasukan">Tanggal Awal</label>
                                  <input type="date" class="form-control" name="tanggalawal" required="">
                              </div>
                              <div class="form-group">
                                  <label for="tgl_pemasukan">Tanggal Akhir</label>
                                  <input type="date" class="form-control" name="tanggalakhir" required="">
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary"><i
                                      class="fa fa-print"></i>&nbsp;Cetak</button>
                              <button type="reset" name="reset" class="btn btn-dark "><i
                                      class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
          <!-- /.row -->

          <!-- /.container-fluid -->
      </div>
      <!-- /.content -->


      <br>
      <!--Content -->


      <div class="content" id="bulanfilter">
          <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8">
                  <div class="card card-primary shadow-sm border-bottom-primary">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Bulan</h6>
                      </div>
                      <div class="card-body">
                          <form action="<?php echo base_url("admin/laporan_pengeluaran/filter"); ?>" method="POST"
                              target='_blank'>
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
                                  <select name="bulanawal" id="bulanawal" class="custom-select" required="">
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
                                  <select name="bulanakhir" id="bulanakhir" class="custom-select" required="">
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

                              <button type="submit" name="submit" class="btn btn-primary"><i
                                      class="fa fa-print"></i>&nbsp;Cetak</button>
                              <button type="reset" name="reset" class="btn btn-dark "><i
                                      class="fas fa-sync-alt"></i>&nbsp;Reset</button>
                              <!-- <a href="<?php echo base_url("user/laporan"); ?>" class="btn btn-primary"> <i
                                          class="fas fa-arrow-left"></i>&nbsp;Kembali </a> -->
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.row -->
      </div>
      <!-- /.content -->

      <!--Content -->
      <p>
      <div class="content" id="tahunfilter">
          <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-8">
                  <div class="card card-primary shadow-sm border-bottom-primary">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Form Filter Berdasarkan Tahun</h6>
                      </div>
                      <div class="card-body">
                          <form action="<?php echo base_url("admin/laporan_pengeluaran/filter"); ?>" method="POST"
                              target='_blank'>
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

                              <button type="submit" name="submit" class="btn btn-primary"><i
                                      class="fa fa-print"></i>&nbsp;Cetak</button>
                              <button type="reset" name="reset" class="btn btn-dark "><i
                                      class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                          </form>
                      </div>
                  </div>
              </div>

          </div>
          <!-- /.row -->
      </div>
      <!-- /.content -->


      </section>
      <!-- section -->
  </div>
  <p>
      <!-- /.content-wrapper -->
      </div>
      <script type="text/javascript">
      /*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
      $(document).ready(function() {

          $("#tanggalfilter").hide();
          $("#tahunfilter").hide();
          $("#bulanfilter").hide();

      });

      /*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

      function prosesPeriode() {
          var periode = $("[name='periode']").val();

          if (periode == "tanggal") {
              $("#btnproses").hide();
              $("#tanggalfilter").show();
              $("[name='valnilai']").val('tanggal');

          } else if (periode == "bulan") {
              $("#btnproses").hide();
              $("[name='valnilai']").val('bulan');
              $("#bulanfilter").show();

          } else if (periode == "tahun") {
              $("#btnproses").hide();
              $("[name='valnilai']").val('tahun');
              $("#tahunfilter").show();
          }
      }

      /*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/

      function prosesReset() {
          $("#btnproses").show();

          $("#tanggalfilter").hide();
          $("#tahunfilter").hide();
          $("#bulanfilter").hide();

          $("#periode").val('');
          $("#tanggalawal").val('');
          $("#tanggalakhir").val('');
          $("#tahun1").val('');
          $("#bulanawal").val('');
          $("#bulanakhir").val('');
          $("#tahun2").val('');

      }
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>