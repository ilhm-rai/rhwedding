<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Edit Vendor</h1>
    </div>
    <form action="/vendors/products/save" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="vendor-id" value="<?= $vendor['vendor_id']; ?>">
        <div class="form-group row">
            <label for="vendor-name" class="col-sm-2 col-form-label">Vendor Name <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill" id="vendor-name" name="vendor-name" value="<?= $vendor['vendor_name']; ?>">
                <div class="invalid-feedback">
                    
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="productImage" class="col-2 col-form-label">Vendor Cover</label>
            <div class="col-10 row justify-content-between">
                <!-- main image -->
                <div class="col-12">
                    <div class="img-add w-100">
                        <label for="cover-img">
                            <img src="/img/vendors/cover/<?= $vendor['vendor_cover']; ?>" class="main-preview object-fit"/>
                        </label>
                        <input id="cover-img" name="cover-img" type="file" class="" value="<?= $vendor['vendor_cover']; ?>" onchange="previewImg('cover-img','main-preview')"/>
                        <div class="invalid-feedback text-center">
                            
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
            <label for="product-description" class="col-sm-2 col-form-label">Vendor Description <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <textarea class="form-control tiny-textarea" name="product-description"  id="product-description" rows="4" style="border-radius: 15px;">
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