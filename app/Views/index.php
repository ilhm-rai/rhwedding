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
    <div class="content-frame mb-5 shadow clearfix" style="clear: both; overflow: hidden;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="content-heading mb-0">Service</h1>
        </div>
        <div class="swiper-container-service w-100">
            <div class="swiper-wrapper">
                <?php foreach ($servicesByProduct as $service) : ?>
                    <div class="swiper-slide d-flex">
                        <a href="products/services/<?= urlencode($service['service_name']); ?>" class="service">
                            <img src="/img/vendors/service/1.jpg" alt="" class="img-service">
                            <p class="service-name"><?= $service['service_name']; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php if (count($servicesByProduct) > 7) : ?>
                    <div class="swiper-slide">
                        <a href="#" class="service">
                            <div class="img-service service">
                                <span class="fa fa-ellipsis-h"></span>
                            </div>
                            <p class="service-name">See more</p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php foreach ($servicesByProduct as $service) : ?>
        <div class="content-frame bg-none">
            <h1 class="main-product-title"><?= $service['service_name']; ?></h1>
            <p class="product-desc"><?= $service['description']; ?></p>
            <div class="row">
                <?php foreach ($products as $product) : ?>
                    <?php if ($service['id'] == $product['product_service_id']) : ?>
                        <div class="col-3">
                            <a href="/<?= $product['slug']; ?>">
                                <div class="card card-product">
                                    <img src="/img/products/main-img/<?= $product['product_main_image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $product['product_name']; ?></h5>
                                        <p class="main-product-price">Rp<?= number_format($product['price'], 0, ',', '.'); ?>,-</p>
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

    <!-- blog -->
    <div class="content-frame bg-none">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="content-heading mb-0">Blog For You</h1>
            <a href="/vendors/products/add" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill"> Read More</a>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card card-blog">
                    <img src="/img/blogs/6.jpg" class="card-img-top main-img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Title Blog</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nostrum esse voluptate quos mollitia! Vitae quis dolore illo suscipit illum eum nisi maxime ipsam nesciunt est officiis, earum molestiae praesentium.</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-blog">
                            <img src="/img/blogs/6.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Title Blog</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde inventore ducimus eaque magni! Porro, impedit!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-blog">
                            <img src="/img/blogs/6.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Title Blog</h5>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam minima, neque voluptate distinctio voluptatibus temporibus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    const swiperService = new Swiper('.swiper-container-service', {
        slidesPerView: 6,
        spaceBetween: 25,
    });
</script>
<?= $this->endSection(); ?>