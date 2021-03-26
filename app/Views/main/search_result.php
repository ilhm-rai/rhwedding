<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">

<!-- search result vendor -->
<?php if($vendors): ?>
    <?php foreach($vendors as $vendor) : ?>
    <h5 class="ml-3 mb-3">vendors related with <span class="text-wild-watermelon font-weight-bold">"<?= $keyword; ?>"</span></h5>
    <div class="content-frame mb-5 shadow">
        <div class="row mb-4 align-items-center">
            <div class="col-2">
                <img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="img-profile" width="100px">
            </div>
            <div class="col-8">
                <p class="font-weight-bold"><?= $vendor['vendor_name']; ?></p>
                <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span>
            </div>
            <div class="col-2">
            <a href="/vendors/products/add" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill">Visit The Vendor</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

    <!-- search result product -->
<?php if($products): ?>
    <h5 class="ml-3 mb-3">Product related with <span class="text-wild-watermelon font-weight-bold">"<?= $keyword; ?>"</span></h5>
    <div class="row">
    <?php foreach($products as $product): ?>
        <div class="col-3">
            <a href="">
                <div class="card card-product">
                    <img src="/img/products/main-img/<?= $product['product_main_image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_name']; ?></h5>
                        <p class="main-product-price">Rp. 4.000.000</p>
                        <div class="rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star unrate"></span>
                        </div>
                        <p class="main-product-location">Tasikmalaya</p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    const swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 4000,
        },
        loop: true,
    });
</script>
<?= $this->endSection(); ?>