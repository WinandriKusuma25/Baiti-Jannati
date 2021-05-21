<?php
error_reporting(E_ALL);
?>
<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-N-Aj7Rb36USfRJcC"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>





<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Donasi</h1>
        <small>
            <div class="text-muted"> Donasi &nbsp; / &nbsp; <a href="<?php echo base_url("member/donasi"); ?>">Tambah
                    Donasi</a>
            </div>
        </small>
    </div>
    <div class="row">

        <div class="col-xl-7 col-lg-7">
            <!-- <div class="alert alert-primary" role="alert">
                <p> * Silahkan memasukkan nominal donasi, donasi Anda sangat berharga buat kami.
            </div> -->
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Donasi</h6>
                </div>
                <div class="card-body border-bottom-primary">
                    <form id="payment-form" method="post" action="<?= site_url() ?>/member/donasi/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">

                        <?php
                        foreach ($user as $ad) : ?>
                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>
                        <?php endforeach ?>


                        <div class="form-group">
                            <label for="nama">Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" min="1" required
                                placeholder="Masukkan nominal Anda" value="<?= set_value('nominal')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label for="keterangan">Berdoa di donasi ini</label>
                            <textarea placeholder="Masukkan nominal Anda" name="keterangan" id="keterangan" cols="50"
                                rows="" class="form-control" value="<?= set_value('keterangan')  ?>"> </textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button button class="btn btn-primary" id="pay-button"> <i
                                class="fas fa-fw fa-hand-holding-heart"></i>&nbsp;Donasi Sekarang</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sekilas Info</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="<?= base_url(); ?>assets/images/donasi.svg" alt="">
                        <br>
                        Silahkan memasukkan nominal donasi, donasi Anda sangat berharga buat kami.
                    </div>

                </div>
            </div>
        </div>




    </div>
    <p>
    <p>
</div>
</div>








<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    // $(this).attr("disabled", "disabled");

    //untuk mendapatkan value dari id
    // var keterangan = $("#keterangan").val();
    var nominal = $("#nominal").val();


    $.ajax({
        type: 'POST',
        url: '<?= site_url() ?>/member/donasi/token',
        data: {
            nominal: nominal
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                }
            });
        }
    });
});
</script>