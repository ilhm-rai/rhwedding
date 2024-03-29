<?= $this->extend('templates/admin'); ?>


<?= $this->section('content'); ?>


<div class="swiper-container mb-4">
    <div class="swiper-wrapper">
        <div class="swiper-slide pl-2 pr-2">
            <img class="img-fluid img-rounded" src="/img/banners/1.jpg">
        </div>
        <div class="swiper-slide pl-2 pr-2">
        <img src="<?= base_url('img/jumbotron-admin.jpg'); ?>" class="img-fluid img-rounded" alt="Jumbotron image">
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-fw fa-user fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs text-wild-watermelon font-weight-bold text-uppercase mb-1">
                            Total Users</div>
                        <div class="h5 mb-0 font-weight-bold"><?= $total_user; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 border-0 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-fw fa-store fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Vendor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_vendor; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-fw fa-box-open fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Product
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_product; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Transaction</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaction ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 border-0 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($earnings['earnings'], 0, ',', '.'); ?></div>
                    </div>
            </div>
                </div>
        </div>
    </div>
</div>

<!-- 
<div class="container-fluid content-frame shadow">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Transaction</h1>
    </div>
</div> -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    const swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 4000,
        },
        loop: true,
    });

    const swiperService = new Swiper('.swiper-container-service', {
        slidesPerView: 6,
        spaceBetween: 25,
    });
</script>
<?= $this->endSection(); ?>