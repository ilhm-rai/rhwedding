<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="content-heading mb-0 text-gray-800">Vendor Profile</h1>
    </div>
    <div class="row mb-4 align-items-center">
        <div class="col-2">
            <img src="/img/vendors/logo/logo.png" alt="" class="img-profile" width="100px">
        </div>
        <div class="col">
            <p class="font-weight-bold"><?= $vendor['vendor_name']; ?></p>
            <span class="badge badge-geyser p-2"><i class="fas fa-gem"></i> <?= $vendor['vendor_level']; ?> Vendor</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <video playsinline controls>
            <source src="/video/vendors/billboard/<?= $vendor['vendor_billboard']; ?>" type="video/mp4">
        </video>
            <form>
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <label for="owner" class="v-form-label">Owner</label>
                    <input type="text" class="form-control rounded-pill" name="owner" id="owner" value="<?= $user['full_name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="services" class="v-form-label">Services</label>
                    <div class="service-group d-block ml-3">
                        <span class="badge badge-geyser p-2">Wedding Planner</span>
                        <span class="badge badge-geyser p-2">Makeup Artist</span>
                        <a href="#" class="badge badge-geyser p-2"><span class="fa fa-plus"></span></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="v-form-label">Address</label>
                    <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;"><?= $user['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="v-form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" style="border-radius: 20px;"><?= $vendor['vendor_description']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-wild-watermelon rounded">Save</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
