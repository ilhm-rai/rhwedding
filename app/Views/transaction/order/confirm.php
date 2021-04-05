<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendor Profile</h1>
    </div>
    <div class="js-item-group-by-vendor">
        <div class="content-frame mb-4 shadow">
        <p class="font-weight-bold"><span class="badge badge-geyser p-2"><?= $trans['transaction_code']; ?></span></p>
        <!-- list detail transaksi -->
       <?php foreach($detail as $d) : ?>
            <div class="content-frame mb-3 shadow p-0">
                <div class="card card-product">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <img src="/img/products/main-img/<?= $d['product_main_image']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body col-6 row">
                            <div class="col-8">
                                <h5 class="card-title"><?= $d['product_name']; ?></h5>
                                <p class="main-product-price">
                                <td>Rp<?= number_format($d['sub_total_payment'],0,',','.'); ?>,-</td>
                                </p>
                                <p class="main-product-location">Tasikmalaya</p>
                            </div>
                            <div class="col-4">
                                <p class="main-product-location mb-0">Service</p>
                                <p class="main-product-price"><?= $d['service_name']; ?></p>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <a href="#" class="btn rounded-pill btn-success">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
   
</div>
<?= $this->endSection(); ?>

