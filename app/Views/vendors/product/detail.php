<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-sm-6 pl-0">
            <div class="row mb-3">
                <div class="col-12 p-0">
                    <img src="/img/products/product-1.jpg" alt="" class="img-main">
                </div>
            </div>
            <div class="row img-second">
                <div class="col-3">
                    <img src="/img/products/product-2.jpg" alt="">
                </div>
                <div class="col-3 ">
                    <img src="/img/products/product-3.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="/img/products/product-4.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="/img/products/product-5.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 pr-0 pl-4">
            <h2 class="product-name">Wedding Organizer Classic</h2>
            <p class="d-inline">
                321 orders ᆞ
            <div class="rating d-inline">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star unrate"></span>
            </div>
            (302 reviews)
            </p>
            <h2 class="product-price">Rp. 4.000.000</h2>
            <p class="product-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel

                Spesification :

                1.Lorem ipsum dolor
                2.Lorem ipsum dolor sit amet,
                3.Lorem ipsum dolor sit amet, consectetur
            </p>
            <a href="#" class="btn btn-info rounded-pill">Edit Product</a>
            <a href="#" class="btn btn-danger rounded-pill">Delete Product</a>
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
        <p class="feedback">
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