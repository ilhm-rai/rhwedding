<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="main-product-title mb-4">Checkout</h1>
    <!-- product per vendor -->
    <div class="content-frame mb-5 shadow">
        <p class="font-weight-bold text-wild-watermelon">Wedding Address</p>
        <!-- card product list -->
        <div class="content-frame mb-3 shadow pb-0 pt-0">
            <div class="card card-product">
                <div class="row align-items-center justify-content-between">
                    <div class="card-body col-6">
                        <p class="font-weight-bold mb-0">Muhamad Arsaludin <span class="badge badge-neon p-2">Main Address</span></p>
                        <p class="mb-0">+6281292040869</p>
                        <p>Kp. Nagarawangi RT. 02 RW. 04 Desa Nusawangi, Kec. Cisayong Kab. Tasikmalaya Jawa Barat</p>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="btn btn-info rounded-pill"><i class="fas fa-pen mr-1"></i> Change</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product per vendor -->
    <div class="content-frame mb-5 shadow">
        <p class="font-weight-bold">RH Wedding Planner <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span></p>
        <!-- card product list -->
        <div class="content-frame mb-3 shadow p-0">
            <div class="card card-product">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img src="/img/products/6.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body col-6 row">
                        <div class="col-5">
                            <h5 class="card-title">Davinci Photografi</h5>
                            <p class="main-product-price">Rp. 4.000.000</p>
                            <p class="main-product-location">Tasikmalaya</p>
                        </div>
                        <div class="col-4">
                            <p class="main-product-location mb-0">Date and Time</p>
                            <p class="main-product-price">14 Juni 2023</p>
                            <p class="main-product-location mb-0">08.00 WIB</p>
                        </div>
                        <div class="col-3">
                            <p class="main-product-location mb-0">Service</p>
                            <p class="main-product-price">Attire & Dress</p>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="btn rounded-pill btn-action"><i class="fas fa-trash mr-1"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card product list -->
        <div class="content-frame mb-3 shadow p-0">
            <div class="card card-product">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img src="/img/products/6.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body col-6 row">
                        <div class="col-5">
                            <h5 class="card-title">Davinci Photografi</h5>
                            <p class="main-product-price">Rp. 4.000.000</p>
                            <p class="main-product-location">Tasikmalaya</p>
                        </div>
                        <div class="col-4">
                            <p class="main-product-location mb-0">Date and Time</p>
                            <p class="main-product-price">14 Juni 2023</p>
                            <p class="main-product-location mb-0">08.00 WIB</p>
                        </div>
                        <div class="col-3">
                            <p class="main-product-location mb-0">Service</p>
                            <p class="main-product-price">Attire & Dress</p>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="btn rounded-pill btn-action"><i class="fas fa-trash mr-1"></i> Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mb-5">
        <div class="col-4">
            <h4 class="text-wild-watermelon font-weight-bolder">Shopping Summary</h4>
            <table class="shop-summary mt-4" width="100%">
                <tr>
                    <td class="field" width="50%">Sub Total :</td>
                    <td>Rp. 8.000.000,-</td>
                </tr>
                <tr>
                    <td class="field">Handling Fee :</td>
                    <td>Rp.10.000,-</td>
                </tr>
                <tr>
                    <td class="field">Total :</td>
                    <td class="text-wild-watermelon font-weight-bold">Rp. 8.010.000,-</td>
                </tr>
            </table>
            <div class="btn btn-wild-watermelon mt-5">Select a payment method</div>
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