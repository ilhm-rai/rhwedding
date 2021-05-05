<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Edit Vendor</h1>
    </div>
    <form action="/vendors/myvendor/update" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="vendor-id" value="<?= $vendor['vendor_id']; ?>">
    <input type="hidden" name="old-vendor-name" value="<?= $vendor['vendor_name']; ?>">
    <input type="hidden" name="old-slug" value="<?= $vendor['slug']; ?>">
    <input type="hidden" name="old-vendor-banner" value="<?= $vendor['vendor_banner']; ?>">
        <div class="form-group row">
            <label for="vendor-name" class="col-sm-2 col-form-label">Vendor Name <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill <?= ($validation->hasError('vendor-name') ? 'is-invalid' : ''); ?>" id="vendor-name" name="vendor-name" value="<?=  $validation->hasError('vendor-name')? old('vendor-name') : $vendor['vendor_name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('vendor-name'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="contact" class="col-sm-2 col-form-label">Contact <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill <?= ($validation->hasError('contact') ? 'is-invalid' : ''); ?>" id="contact" name="contact" value="<?=  $validation->hasError('contact')? old('contact') : $vendor['contact_vendor']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('contact'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">City <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill <?= ($validation->hasError('city') ? 'is-invalid' : ''); ?>" id="city" name="city" value="<?=  $validation->hasError('city')? old('city') : $vendor['city']; ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('city'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="vendor-banner" class="col-2 col-form-label">Vendor Banner</label>
            <div class="col-10 row justify-content-between">
                <!-- main image -->
                <div class="col-12">
                    <div class="img-add w-100">
                        <label for="vendor-banner">
                            <img src="/img/vendors/banners/<?= $vendor['vendor_banner']; ?>" class="main-preview object-fit"/>
                        </label>
                        <input id="vendor-banner" name="vendor-banner" type="file" class="" value="<?= $vendor['vendor_banner']; ?>" onchange="previewImg('vendor-banner','main-preview')"/>
                        <div class="invalid-feedback text-center">
                        <?= $validation->getError('vandor-banner'); ?>
                        </div>
                    </div>
                    <p class="text-center">Vendor Cover<sup class="text-wild-watermelon">*</sup></p>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="productVideo" class="col-sm-2 col-form-label">Vendor Video</label>
            <div class="col-sm-10 position-relative">
                <div class="video-add">
                    <label for="file-video">
                        <video class="object-fit" controls>
                            <source src="/video/vendors/billboard/<?= $vendor['vendor_billboard']; ?>" type="video/mp4">
                        </video>
                    </label>
                    <input id="file-video" type="file" />
                </div>
                <label for="file-video" class="btn btn-sm btn-wild-watermelon ml-4 mt-4 position-absolute" style="top: 0"><span class="fa fa-video" title="Ubah video"></span> Ubah Video</a>
            </div>
        </div>
        <div class="form-group row">
            <label for="vendor-address" class="col-sm-2 col-form-label">Vendor Address <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <textarea class="form-control tiny-textarea" name="vendor-address"  id="vendor-address" rows="4" style="border-radius: 15px;">
                <?= $vendor['vendor_address']; ?>
                </textarea>
                <div class="invalid-feedback text-center">
                    
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="vendor-description" class="col-sm-2 col-form-label">Vendor Description <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <textarea class="form-control tiny-textarea" name="vendor-description"  id="vendor-description" rows="4" style="border-radius: 15px;">
                <?= $vendor['vendor_description']; ?>
                </textarea>
                <div class="invalid-feedback text-center">
                    
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col d-flex justify-content-end">
            <a href="#" class="btn btn-gray rounded-pill mr-2">Cancel</a>
            <button type="submit" class="btn btn-wild-watermelon rounded-pill">Save</button>
        </div>
    </div>
    </form>
</div>
<?= $this->endSection(); ?>