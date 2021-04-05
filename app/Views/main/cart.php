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
    <div class="js-item-group-by-vendor">

    </div>
    <div class="row justify-content-end mb-5">
        <div class="col-4 text-right">
            <a href="#" class="btn btn-wild-watermelon">Checkout</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    getItemInUserCart();
</script>
<?= $this->endSection(); ?>