<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendor Profile</h1>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>
    <div class="row">
        <div class="col">
            <div class="mb-3">
            <img src="/img/vendors/banners/<?= ($vendor['vendor_banner'])?$vendor['vendor_banner']:'1.jpg'; ?>" alt="" class="w-100 rounded mb-4">
            <div class="content-frame shadow">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="img-profile" width="100px">
                    </div>
                    <div class="col-8">
                        <p class="font-weight-bold"><?= $vendor['vendor_name']; ?></p>
                        <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> <?= $vendor['vendor_level']; ?> Vendor</span>
                    </div>
                </div>
            </div>
        </div>
            <form>
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <label for="owner" class="v-form-label">Owner</label>
                    <input type="text" class="form-control rounded-pill" name="owner" id="owner" value="<?= $user['full_name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="contact" class="v-form-label">Contact Vendor</label>
                    <input type="text" class="form-control rounded-pill" name="contact" id="contact" value="<?= $vendor['contact_vendor']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="city" class="v-form-label">City</label>
                    <input type="text" class="form-control rounded-pill" name="city" id="city" value="<?= $vendor['city']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="services" class="v-form-label">Services</label>
                    <div class="service-group d-block ml-3">
                        <?php foreach ($myServices as $service) : ?>
                            <span class="badge badge-geyser p-2"><?= $service['service_name']; ?></span>
                        <?php endforeach; ?>
                        <a href="<?= base_url('vendors/myvendor/service'); ?>" class="badge badge-geyser p-2"><span class="fa fa-plus"></span></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="v-form-label">Address</label>
                    <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;" readonly><?= $vendor['vendor_address']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="v-form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" style="border-radius: 20px;" readonly><?= $vendor['vendor_description']; ?></textarea>
                </div>
                <a href="/vendors/myvendor/edit" class="btn btn-wild-watermelon rounded text-right">Edit My Vendor</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>