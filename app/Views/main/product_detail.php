<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- product preview -->
    <div class="row mb-5">
        <div class="col-6 pl-0">
            <div class="swiper-container main gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/img/products/main-img/<?= $product['product_main_image']; ?>" alt="" class="img-main"></div>
                    <?php foreach ($productImg as $img) : ?>
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
                    <?php foreach ($productImg as $img) : ?>
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
            <h2 class="product-price">Rp<?= number_format($product['price'], 0, ',', '.'); ?>,-</h2>
            <p class="product-qty">Quantity</p>
            <div class="input-group w-auto d-inline-flex">
                <div class="input-group-prepend">
                    <button class="input-group-text">-</button>
                </div>
                <input type="text" class="form-control text-center" id="qty" name="qty" value="1" style="max-width: 60px;">
                <div class="input-group-append">
                    <button class="input-group-text">+</button>
                </div>
            </div>
            <p class="small mt-1">Minimal order 1</p>
            <p class="product-note">Add Note</p>
            <textarea class="form-control" id="productDescription" rows="4" style="border-radius: 15px;"></textarea>
            <div class="mt-4">
                <a class="btn btn-action rounded-pill js-add-to-cart" data-userid="<?= (logged_in()) ? user()->id : 'false'; ?>" data-productid="<?= $product['id']; ?>"><span class="fa fa-shopping-cart"></span> Add to Cart</a>
                <a class="btn btn-wild-watermelon rounded-pill">Buy Now</a>
            </div>
        </div>
    </div>
    <!-- vendor -->
    <div class="content-frame mb-5 shadow">
        <div class="row mb-4 align-items-center">
            <div class="col-2">
                <img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="img-profile" width="100px">
            </div>
            <div class="col-8">
                <p class="font-weight-bold"><?= $vendor['vendor_name']; ?></p>
                <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> <?= $vendor['vendor_level']; ?> Vendor</span>
            </div>
            <div class="col-2">
                <a href="/vendor/<?= $vendor['vendor_id']; ?>" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill">Visit The Vendor</a>
            </div>
        </div>
    </div>
    <!-- Description -->
    <div class="content-frame mb-5 shadow">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="content-heading mb-0 text-gray-800 mb-4">Product Description</h1>
        </div>
        <p class="text-wrap">
            <?= $product['product_description']; ?>
        </p>
    </div>
    <!-- Review -->
    <div class="content-frame mb-5 shadow">
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
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    // const swiper = new Swiper('.swiper-container', {
    //     autoplay: {
    //         delay: 4000,
    //     },
    //     loop: true,
    // });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        loop: true,
        freeMode: true,
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

    $('.js-add-to-cart').on('click', function() {
        const userId = $(this).data('userid');
        const productId = $(this).data('productid');
        if (userId == false) {
            window.location.replace('/mustlogin');
        } else {
            addToCart(productId);
        }
    })
</script>
<?= $this->endSection(); ?>