<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid mb-5"> 
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>
<div class="row">
        <div class="col-6 pl-0">
            <div class="swiper-container main gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/products/main-img/<?= $product['product_main_image']; ?>" alt="" class="img-main"></div>
                    <?php foreach($productImg as $img): ?>
                        <div class="swiper-slide"><img src="/img/products/other/<?= $img['image']; ?>" alt="" class="img-main"></div>
                    <?php endforeach; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="img-second swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/products/main-img/<?= $product['product_main_image']; ?>" alt="" class=""></div>
                    <?php foreach($productImg as $img): ?>
                    <div class="swiper-slide"><img src="/img/products/other/<?= $img['image']; ?>" alt="" class=""></div>
                    <?php endforeach; ?>
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
            <h2 class="product-price">Rp<?= number_format($product['price'],0,',','.'); ?>,-</h2>
        </div>
    </div>
</div>
<!-- Description -->
<div class="content-frame mb-5 shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="content-heading mb-0 text-gray-800 mb-4">Product Description</h1>
    </div>
    <?= $product['product_description']; ?>
</div>


<!-- Review -->
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

<?= $this->section('script'); ?>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  </script>
<?= $this->endSection(); ?>