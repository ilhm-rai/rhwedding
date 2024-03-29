
<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>

<form id="payment-form" method="post" action="/order/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Order Process</h1>
    </div>
   
   
    <div class="content-frame mb-4 shadow">
        <h4 class="font-weight-bold mb-4 text-wild-watermelon"><?= $trans['transaction_code']; ?></h4>
        <div class="row" role="alert">
            <div class="col-3">
                <span class="mb-0 text-small">Date Order</span>
                <p class="font-weight-bold text-wild-watermelon"><?= $trans['created_at']; ?></p>
            </div>
            <div class="col-3">
                <span class="mb-0 text-small">Event Date</span>
                <p class="font-weight-bold text-wild-watermelon"><?= date("d F Y", strtotime($trans['event_date'])); ?></p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-8">
                <p class="font-weight-bold mb-0">Event Address</p>
                <span class="text-small"><?= $trans['event_address']; ?></span>
            </div>
        </div>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>
 
        <!-- list detail transaksi -->
            <table class="table table-bordered td-align-middle" id="" width="100%" cellspacing="0">
                <thead class="th-no-border">
                    <tr>
                        <th>No</th>
                        <th width='100px'>Image</th>
                        <th>Product Name</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($detail as $item): ?>
                    <?php if($item['confirm'] == 1) :?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><img src="/img/products/main-img/<?= $item['product_main_image']; ?>" alt="" class="w-100"></td>
                        <td><?= $item['product_name']; ?></td>
                        <td><?= $item['service_name']; ?></td>
                        <td>Rp<?= number_format($item['price'],0,',','.'); ?>,-</td>
                        <?php 
                            if($item['confirm'] == 1){
                                $color = 'text-success';
                                $text = 'Accepted <i class="fas fa-check"></i>';
                            }else if($item['confirm'] == null){ 
                                $color = 'text-warning';
                                $text = 'Need Confirm <i class="fas fa-exclamation"></i>';
                            }else{
                                $color = 'text-danger';
                                $text = 'Rejected <i class="fas fa-times"></i>';
                            }
                        ?>
                        <td><p class="<?= $color; ?> status-<?= $item['id']; ?> "><?= $text; ?></p></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <div class="row justify-content-end">
            <div class="col-6">
                <h5 class="font-weight-bold mb-4 text-wild-watermelon">Order Sumary</h5>
                <div class="row">
                    <div class="col">
                        <p class="font-weight-bold">Amount Paid :</p>
                    </div>
                    <div class="col">
                    <input type="hidden" name="total" id='total' value='0'>
                    <h4 class="font-weight-bold text-wild-watermelon total-screen">Rp<?= number_format($trans['cash_in'],0,',','.'); ?>,-</h4>
                    <!-- <button type='button' class='btn btn-wild-watermelon mt-3' id='pay-button'>Pay Now</button> -->
                    <button type='button' class='btn btn-wild-watermelon mt-3' id='pay-button'>Pay Now</button>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
</div>


   
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataProducts').DataTable();
    });
</script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-QD_c2mAionu-LIuk"></script>
        <script type="text/javascript">

        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>', {
                    // Optional
                    onSuccess: function(result){
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result){
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }

                });
            };
        </script>
<?= $this->endSection(); ?>



