<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid mb-5">
<div class="row">
        <div class="col-6 pl-0 pr-0">
            <div class="row mb-3">
                <div class="col-12">
                <img src="/img/products/<?= $product['product_main_image']; ?>" alt="" class="img-main">
                </div>
            </div>
            <div class="row img-second">
                <div class="col-3">
                    <img src="/img/products/2.jpg" alt="">
                </div>
                <div class="col-3 ">
                    <img src="/img/products/3.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="/img/products/4.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="/img/products/5.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 pl-4">
            <h2 class="product-name"><?= $product['product_name']; ?></h2>
            <p class="d-inline">
            <?= $product['product_sold']; ?> orders ᆞ
            <div class="rating d-inline">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star unrate"></span>
            </div>
            (<?= $product['total_review']; ?> reviews)
            </p>
            <h2 class="product-price">Rp<?= $product['price']; ?></h2>
        </div>
    </div>
</div>
<div class="container-fluid content-frame mb-5 shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="content-heading mb-0 text-gray-800 mb-4">Product Review</h1>
    </div>
    <div class="review">
        <h2 class="reviewer">Dini Indriani</h2>
        <div class="rating">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star unrate"></span>
        </div>
        <p class="feedbac k">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil dolorem rem cum voluptates consequatur sunt eum perspiciatis tenetur distinctio temporibus!
        </p>
        <div class="date-post">~03 Feb 2021</div>
    </div>
    <div class="review">
        <h2 class="reviewer">Firdha Khoerunnisa</h2>
        <div class="rating">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
        <p class="feedback">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil dolorem rem cum voluptates consequatur sunt eum perspiciatis tenetur distinctio temporibus!
        </p>
        <div class="date-post">~03 Feb 2021</div>
    </div>
</div>
<?= $this->endSection(); ?>