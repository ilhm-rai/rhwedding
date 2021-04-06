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
                        <p class="font-weight-bold mb-0"><?= $user['full_name']; ?> <span class="badge badge-neon p-2">Main Address</span></p>
                        <p class="mb-0"><?= $user['contact']; ?></p>
                        <p><?= $user['address']; ?></p>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#" class="btn btn-info rounded-pill"><i class="fas fa-pen mr-1"></i> Change</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product per vendor -->
    <div class="js-item-checkout">
    </div>
    <div class="row justify-content-end mb-5">
        <div class="col-4">
            <h4 class="text-wild-watermelon font-weight-bolder">Shopping Summary</h4>
            <table class="shop-summary mt-4" width="100%">
                <tr>
                    <td class="field" width="50%">Sub Total :</td>
                    <td class="js-subtotal"></td>
                </tr>
                <tr>
                    <td class="field">Handling Fee :</td>
                    <td>Rp.10.000,-</td>
                </tr>
                <tr>
                    <td class="field">Total :</td>
                    <td class="text-wild-watermelon font-weight-bold js-total"></td>
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

    getCheckoutItem();
</script>
<?= $this->endSection(); ?>