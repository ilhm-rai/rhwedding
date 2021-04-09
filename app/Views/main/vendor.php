<?= $this->extend('templates/main'); ?>

<?= $this->section('banner'); ?>
<div class="vendor-profile">
    <img src="/img/vendors/banners/<?= $vendor['vendor_banner']; ?>" alt="" class="cover">
    <div class="container-fluid">
        <div class="content-frame mb-5 shadow">
            <div class="row mb-4 align-items-center">
                <div class="col-2">
                    <img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="img-profile" width="100px">
                </div>
                <div class="col-8">
                    <p class="font-weight-bold"><?= $vendor['vendor_name']; ?></p>
                    <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> <?= $vendor['level']; ?> Vendor</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- <ul class="nav vendor-nav mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Vendor Store</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
        </li>
    </ul> -->
    <?php if($vendor['vendor_billboard']) :?>
    <div class="vendor-video">
        <video class="object-fit" controls>
            <source src="/video/vendors/billboard/<?= $vendor['vendor_billboard']; ?>" type="video/mp4">
        </video>
    </div>
    <?php endif ?>
    <div class="content-frame mt-5 shadow mb-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="content-heading mb-0">All Products</h1>
        </div>
        <div class="row">
        <?php foreach($products as $product) :?>
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
                            <p class="main-product-location"><?= $vendor['city']; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="text-center">
            <nav aria-label="Page navigation example" class="d-inline-block">
                <ul class="main pagination">
                    <li class="page-item">
                        <a class="page-link previous disabled" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="fa fa-arrow-left"></span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link next" href="#" aria-label="Next">
                            <span aria-hidden="true" class="fa fa-arrow-right"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>