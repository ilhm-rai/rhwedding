<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="content-frame mb-4 shadow">
        <div class="row content-frame pt-0 pb-0 pl-0">
            <div class="col-3">
                <p class="font-weight-bold text-wild-watermelon m-0">Product Information</p>
            </div>
            <div class="col-6">
                <p class="text-right text-wild-watermelon m-0">Select All</p>
            </div>
            <div class="col-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="select-all">
                    <label class="custom-control-label" for="select-all">&nbsp;</label>
                </div>
            </div>
            <div class="col-2">
                <p class="text-center m-0">Action</p>
            </div>
        </div>
    </div>
    <!-- product per vendor -->
    <?php foreach ($itemsByVendor as $items) : ?>
        <div class="content-frame mb-4 shadow">
            <p class="font-weight-bold"><?= $items[0]['vendor_name']; ?> <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> Platinum Vendor</span></p>
            <!-- card product list -->
            <?php foreach ($items as $item) : ?>
                <div class="content-frame mb-3 shadow p-0">
                    <div class="card card-product">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img src="/img/products/main-img/<?= $item['product_main_image']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body col-6 row">
                                <div class="col-8">
                                    <h5 class="card-title"><?= $item['product_name']; ?></h5>
                                    <p class="main-product-price">Rp<?= number_format($item['price'], 0, ',', '.'); ?></p>
                                    <p class="main-product-location">Tasikmalaya</p>
                                    <div class="input-group w-auto d-inline-flex">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text">-</button>
                                        </div>
                                        <input type="text" class="form-control text-center" id="qty" name="qty" value="1" style="max-width: 60px;">
                                        <div class="input-group-append">
                                            <button class="input-group-text">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p class="main-product-location mb-0">Service</p>
                                    <p class="main-product-price"><?= $item['service_name']; ?></p>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="item-<?= $item['product_id']; ?>" <?= ($item['process_into_transaction'] ? 'checked' : '') ?>>
                                    <label class="custom-control-label" for="item-<?= $item['product_id']; ?>">&nbsp;</label>
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <a href="#" data-item-id="<?= $item['product_id']; ?>" class="btn rounded-pill btn-action js-delete-item"><i class="fas fa-trash mr-1"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <div class="row justify-content-end mb-5">
        <div class="col-4 text-right">
            <a href="#" class="btn btn-wild-watermelon">Checkout</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>