<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Transaction Detail</h1>
    </div>

    <h4 class="font-weight-bold mb-4 text-wild-watermelon"><?= $trans['transaction_code']; ?></h4>
    <div class="row" role="alert">
        <div class="col-3">
            <span class="mb-0 text-small">Client Name</span>
            <p class="font-weight-bold text-wild-watermelon"><?= $trans['customer']; ?></p>
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
    <div class="table-responsive mb-4">
        <table class="table table-bordered td-align-middle" id="dataProducts" width="100%" cellspacing="0">
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
                <?php $i = 1;
                $total = 0; ?>
                <?php foreach ($detail as $item) : ?>
                    <?php ($item['confirm'] > 0) ? $total += $item['price'] : 0; ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><img src="/img/products/main-img/<?= $item['product_main_image']; ?>" alt="" class="w-100"></td>
                        <td><?= $item['product_name']; ?></td>
                        <td><?= $item['service_name']; ?></td>
                        <td>Rp<?= number_format($item['price'], 0, ',', '.'); ?>,-</td>
                        <?php
                        if ($item['confirm'] == 1) {
                            $color = 'text-success';
                            $text = 'Accepted';
                        } else if ($item['confirm'] == null) {
                            $color = 'text-warning';
                            $text = 'Need Confirm';
                        } else {
                            $color = 'text-danger';
                            $text = 'Rejected';
                        }
                        ?>
                        <td>
                            <p class="<?= $color; ?> status-<?= $item['id']; ?> "><?= $text; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row justify-content-end">
        <div class="col-6">
            <h5 class="font-weight-bold mb-4 text-wild-watermelon">Order Sumary</h5>
            <div class="row">
                <div class="col">
                    <p class="font-weight-bold">Amount received :</p>
                </div>
                <div class="col">
                    <input type="hidden" name="total" id='total' value='0'>
                    <h4 class="font-weight-bold text-wild-watermelon total-screen">Rp<?= number_format($total, 0, ',', '.'); ?>,-</h4>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>