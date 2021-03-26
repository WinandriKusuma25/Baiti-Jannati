<head>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-N-Aj7Rb36USfRJcC"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Donasi</h6>
                </div>
                <div class="card-body">
                    <form id="payment-form" method="post" action="<?= site_url() ?>/member/donasi/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">

                        <!-- <div class="form-group">
                            <label for="nama">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="<?= set_value('nama')  ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->

                        <div class="form-group">
                            <label for="nama">Nominal</label>
                            <input type="text" class="form-control" id="nominal" name="nominal"
                                value="<?= set_value('nominal')  ?>">
                            <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button button class="btn btn-primary" id="pay-button">Bayar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>








<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

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