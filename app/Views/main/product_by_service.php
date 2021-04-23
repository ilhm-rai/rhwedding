<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="content-frame bg-none pt-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $service_name; ?></li>
        </ol>
    </nav>
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-3 mb-3">
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
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>