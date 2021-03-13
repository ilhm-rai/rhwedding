<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Add New Product</h1>
    </div>
    <form>
        <div class="form-group row">
            <label for="productName" class="col-sm-2 col-form-label">Product Name <sup>*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill" id="productName">
            </div>
        </div>
        <div class="form-group row">
            <label for="vendorCategory" class="col-sm-2 col-form-label">Vendor Category <sup>*</sup></label>
            <div class="col-sm-10">
                <select class="custom-select rounded-pill">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="productDescription" class="col-sm-2 col-form-label">Product Description <sup>*</sup></label>
            <div class="col-sm-10">
                <textarea class="form-control" id="productDescription" rows="4" style="border-radius: 15px;"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="Price" class="col-sm-2 col-form-label">Price <sup>*</sup></label>
            <div class="col-sm-10">
                <input type="number" class="form-control rounded-pill" id="Price">
            </div>
        </div>
        <div class="form-group row">
            <label for="productImage" class="col-sm-2 col-form-label">Product Image</label>
            <div class="col-sm-10 d-flex justify-content-between">
                <div class="img-add">
                    <label for="file-input">
                        <img src="/img/jumbotron-admin.jpg" class="object-fit" />
                    </label>
                    <input id="file-input" type="file" />
                </div>
                <div class="img-add">
                    <label for="file-input-1">
                        <img src="/img/plus-icon.png" />
                    </label>
                    <input id="file-input-1" type="file" />
                </div>
                <div class="img-add">
                    <label for="file-input-2">
                        <img src="/img/plus-icon.png" />
                    </label>
                    <input id="file-input-2" type="file" />
                </div>
                <div class="img-add">
                    <label for="file-input-3">
                        <img src="/img/plus-icon.png" />
                    </label>
                    <input id="file-input-3" type="file" />
                </div>
                <div class="img-add">
                    <label for="file-input-4">
                        <img src="/img/plus-icon.png" />
                    </label>
                    <input id="file-input-4" type="file" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="productVideo" class="col-sm-2 col-form-label">Product Video</label>
            <div class="col-sm-10 position-relative">
                <div class="video-add">
                    <label for="file-video">
                        <video class="object-fit" controls>
                            <source src="/video/vendors/billboard/rhvideo.mp4" type="video/mp4">
                        </video>
                    </label>
                    <input id="file-video" type="file" />
                </div>
                <label for="file-video" class="btn btn-sm btn-wild-watermelon ml-4 mt-4 position-absolute" style="top: 0"><span class="fa fa-video" title="Ubah video"></span> Ubah Video</a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col d-flex justify-content-end">
            <a href="#" class="btn btn-gray rounded-pill mr-2">Cancel</a>
            <a href="#" class="btn btn-wild-watermelon rounded-pill">Save</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>