
<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="row mb-3">
    <div class="col-2">
        <div class="text-center">
            <img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="RH Wedding Logo" class="mb-4" width="80px">
        </div>   
    </div>
    <div class="col-9">
        <h2 class="mb-0 text-gray-800 font-weight-bold mb-2"><?= $vendor['vendor_name']; ?></h2>
        <h5 class="font-weight-bold text-wild-watermelon"><?= $user['full_name']; ?></h5>
        <button type="button" class="btn btn-sm btn-platinum btn-sm small mb-3"><i class="fas fa-gem"></i> <?= $vendor['vendor_level']; ?> Vendor</button>
        <p class="font-weight-bold mb-0 text-gray-800">Address</p> 
        <p class="mb-1"><?= $user['address']; ?></p> 
        <p class="font-weight-bold mb-0 text-gray-800">Description</p> 
        <p class=""><?= $vendor['vendor_description']; ?></p> 
    </div>
</div>
<video playsinline autoplay loop>
    <source src="/video/vendors/billboard/<?= $vendor['vendor_billboard']; ?>" type="video/mp4">
</video>
<?= $this->endSection(); ?>
