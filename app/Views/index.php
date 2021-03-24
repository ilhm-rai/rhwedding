<?= $this->extend('templates/main'); ?>

<?= $this->section('banner'); ?>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="img-fluid" src="/img/banners/1.jpg">
        </div>
        <div class="swiper-slide">
            <img class="img-fluid" src="/img/banners/2.jpg">
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="content-frame mb-5 shadow">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="content-heading mb-0">Service</h1>
        </div>
        <!-- pang swipper keun wkwk -->
        <div class="row">
        <?php foreach($services as $service): ?>
            <div class="col-2">
                <a href="#" class="service">
                    <img src="/img/vendors/service/1.jpg" alt="" class="img-service">
                    <p class="service-name"><?= $service['name']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
            <div class="col-2">
                <a href="#" class="service">
                    <div class="img-service service">
                        <span class="fa fa-ellipsis-h"></span>
                    </div>
                    <p class="service-name">See more</p>
                </a>
            </div>
        </div>
    </div>
    <?php foreach($servicesByProduct as $service): ?>
    <div class="content-frame bg-none">
        <h1 class="main-product-title"><?= $service['name']; ?></h1>
        <p class="product-desc"><?= $service['description']; ?></p>
        <div class="row">
        <?php foreach($products as $product): ?>
            <?php if($service['id']==$product['service_id']): ?>
            <div class="col-3">
                <a href="/product/<?= $product['product_code']; ?>">
                    <div class="card card-product">
                        <img src="/img/products/main-img/<?= $product['product_main_image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['product_name']; ?></h5>
                            <p class="main-product-price">Rp<?= number_format($product['price'],0,',','.'); ?>,-</p>
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
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
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