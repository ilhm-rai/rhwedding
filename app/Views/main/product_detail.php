<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-6">
            <div class="row mb-3">
                <div class="col-12">
                    <img src="/img/products/1.jpg" alt="" class="img-main">
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
        <div class="col-sm-6 pr-0 pl-4">
            <h2 class="product-name">Gaun Monalisa</h2>
            <p class="d-inline">
                30 orders ᆞ
            <div class="rating d-inline">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star unrate"></span>
            </div>
            (20 reviews)
            </p>
            <h2 class="product-price">Rp4.000.000</h2>
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
            <textarea class="form-control mb-4" id="productDescription" rows="4" style="border-radius: 15px;"></textarea>
            <a class="btn btn-action rounded-pill"><span class="fa fa-shopping-cart"></span> Add to Cart</a>
            <a class="btn btn-wild-watermelon rounded-pill">Buy Now</a>
        </div>
    </div>

    <div class="content-frame mb-5 shadow">
        <div class="row mb-4 align-items-center">
            <div class="col-2">
                <img src="/img/vendors/logo/logo.png" alt="" class="img-profile" width="100px">
            </div>
            <div class="col-8">
                <p class="font-weight-bold">RH Wedding Planner</p>
                <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span>
            </div>
            <div class="col-2">
                <a href="/vendors/products/add" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill">Visit The Vendor</a>
            </div>
        </div>
    </div>
    <!-- Description -->
    <div class="content-frame mb-5 shadow">
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="content-heading mb-0 text-gray-800 mb-4">Product Description</h1>
        </div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit ipsum error nemo provident, doloribus magnam mollitia, sit, qui inventore voluptatibus eius ratione rem perspiciatis repellat distinctio accusantium reprehenderit! Consequatur voluptas, corporis numquam ea, temporibus esse rem voluptates modi ullam dicta cupiditate autem officiis quo? Saepe sunt distinctio veniam ratione vero quasi suscipit maiores perferendis cupiditate ut, dolorem nisi in, temporibus repudiandae pariatur id ullam laudantium, libero ipsam adipisci ipsum totam facere architecto eum! Dolorem veritatis nisi facilis earum cum beatae a, recusandae aperiam nemo quod non fugit autem amet, architecto dignissimos. Nobis voluptates molestias non exercitationem possimus odit dicta aliquid.</p>
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
    const swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 4000,
        },
        loop: true,
    });
</script>
<?= $this->endSection(); ?>