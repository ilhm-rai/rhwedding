<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Edit Product</h1>
    </div>
    <form action="/vendors/products/update/<?= $product['slug']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="product-id" value="<?= $product['id']; ?>">
    <input type="hidden" name="old-slug" value="<?= $product['slug']; ?>">
    <input type="hidden" name="old-main-image" value="<?= $product['product_main_image']; ?>">


        <div class="form-group row">
            <label for="product-name" class="col-sm-2 col-form-label">Product Name <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="text" class="form-control rounded-pill <?= ($validation->hasError('product-name') ? 'is-invalid' : ''); ?>" id="product-name" name="product-name" value="<?=  $validation->hasError('product-name')? old('product-name') : $product['product_name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('product-name'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="service" class="col-sm-2 col-form-label">Vendor Service <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <select class="custom-select rounded-pill <?= ($validation->hasError('service') ? 'is-invalid' : ''); ?>" name="service" id="service">
                <?php foreach ($services as $service):?>
                    <?php if($service['id'] == $product['product_service_id']): ?>
                        <option selected value="<?= $service['id']; ?>" ><?= $service['service_name']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                    <!-- <option selected >Select service</option> -->
                    <?php foreach($services as $service) : ?>
                    <?php if($service['id'] != $product['product_service_id']): ?>
                    <option value="<?= $service['id']; ?>"><?= $service['service_name']; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('service'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <input type="number" class="form-control rounded-pill  <?= ($validation->hasError('price') ? 'is-invalid' : ''); ?>" name="price" id="price" value="<?=  $validation->hasError('price')? old('price') : $product['price']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('price'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="productImage" class="col-2 col-form-label">Product Image</label>
            <div class="col-10 row justify-content-between">
                <!-- main image -->
                <div class="col-12">
                    <div class="img-add w-100">
                        <label for="main-img">
                            <img src="/img/products/main-img/<?= $product['product_main_image']; ?>" class="main-preview object-fit" />
                        </label>
                        <input id="main-img" name="main-img" type="file" class="<?= ($validation->hasError('main-img') ? 'is-invalid' : ''); ?>" onchange="previewImg('main-img','main-preview')"/>
                        <div class="invalid-feedback text-center">
                            <?= $validation->getError('main-img'); ?>
                        </div>
                    </div>
                    <p class="text-center">Main Image<sup class="text-wild-watermelon">*</sup></p>
                </div>
                <?php 
                    $countImg = count($productImg);
                    $empty = 4 - $countImg;

                    for ($i=0; $i < $empty ; $i++) { 
                        $indexEmpty =   $countImg+$i;
                        $productImg[$indexEmpty] = false;
                        
                    }                    
                // dd($productImg);
                ?>
                
                <!-- image 1 -->
                <div class="col-3">
                    <div class="img-add">
                        <label for="image1">
                        <?php if($productImg) : ?>
                            <?php if($productImg[0]): ?>
                            <img src="/img/products/other/<?= $productImg[0]['image']; ?>" class="image1-preview object-fit" />
                            <input type="hidden" name="old-image1-id" value="<?= $productImg[0]['id']; ?>">
                            <input type="hidden" name="old-image1" value="<?= $productImg[0]['image']; ?>">
                            <?php else: ?>
                                <img src="/img/plus-icon.png" class="image1-preview" />
                                <input type="hidden" name="old-image1-id" value="">
                                <input type="hidden" name="old-image1" value="">
                            <?php endif; ?>
                        <?php endif; ?>
                            
                        </label>
                        <input id="image1" name="image1" type="file" class="<?= ($validation->hasError('image1') ? 'is-invalid' : ''); ?>" onchange="previewImg('image1','image1-preview')"/>
                        <div class="invalid-feedback text-center">
                            <?= $validation->getError('image1'); ?>
                        </div>
                    </div>
                    <p class="text-center">Image 1</p>
                </div>
                <!-- image 2 -->
                <div class="col-3">
                    <div class="img-add">
                        <label for="image2">
                        <?php if($productImg) : ?>
                            <?php if($productImg[1]): ?>
                            <img src="/img/products/other/<?= $productImg[1]['image']; ?>" class="image2-preview object-fit" />
                            <input type="hidden" name="old-image2-id" value="<?= $productImg[1]['id']; ?>">
                            <input type="hidden" name="old-image2" value="<?= $productImg[1]['image']; ?>">
                            <?php else: ?>
                            <img src="/img/plus-icon.png" class="image2-preview" />
                            <input type="hidden" name="old-image2-id" value="">
                            <input type="hidden" name="old-image2" value="">
                            <?php endif; ?>
                        <?php endif; ?>
                        </label>
                        <input id="image2" name="image2" type="file" class="<?= ($validation->hasError('image2') ? 'is-invalid' : ''); ?>" onchange="previewImg('image2','image2-preview')"/>
                        <div class="invalid-feedback text-center">
                            <?= $validation->getError('image2'); ?>
                        </div>
                    </div>
                    <p class="text-center">Image 2</p>
                </div>
                <!-- image 3 -->
                <div class="col-3">
                    <div class="img-add">
                        <label for="image3">
                        <?php if($productImg) : ?>
                            <?php if($productImg[2]): ?>
                            <img src="/img/products/other/<?= $productImg[2]['image']; ?>" class="image3-preview object-fit" />
                            <input type="hidden" name="old-image3-id" value="<?= $productImg[2]['id']; ?>">
                            <input type="hidden" name="old-image3" value="<?= $productImg[2]['image']; ?>">
                            <?php else: ?>
                            <img src="/img/plus-icon.png" class="image3-preview" />
                            <input type="hidden" name="old-image3-id" value="">
                            <input type="hidden" name="old-image3" value="">
                            <?php endif; ?>
                        <?php endif ?>
                        </label>
                        <input id="image3" name="image3" type="file" class="<?= ($validation->hasError('image3') ? 'is-invalid' : ''); ?>" onchange="previewImg('image3','image3-preview')"/>
                        <div class="invalid-feedback text-center">
                            <?= $validation->getError('image3'); ?>
                        </div>
                    </div>
                    <p class="text-center">Image 3</p>
                </div>
                <!-- image 4 -->
                <div class="col-3">
                    <div class="img-add">
                        <label for="image4">
                        <?php if($productImg) : ?>
                            <?php if($productImg[3]): ?>
                            <img src="/img/products/other/<?= $productImg[3]['image']; ?>" class="image4-preview object-fit" />
                            <input type="hidden" name="old-image4-id" value="<?= $productImg[3]['id']; ?>">
                            <input type="hidden" name="old-image4" value="<?= $productImg[3]['image']; ?>">
                            <?php else: ?>
                            <img src="/img/plus-icon.png" class="image4-preview" />
                            <input type="hidden" name="old-image4-id" value="">
                            <input type="hidden" name="old-image4" value="">
                            <?php endif; ?>
                        <?php endif; ?>
                        </label>
                        <input id="image4" name="image4" type="file" class="<?= ($validation->hasError('image4') ? 'is-invalid' : ''); ?>" onchange="previewImg('image4','image4-preview')"/>
                        <div class="invalid-feedback text-center">
                            <?= $validation->getError('image4'); ?>
                        </div>
                    </div>
                    <p class="text-center">Image 4</p>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="product-description" class="col-sm-2 col-form-label">Product Description <sup class="text-wild-watermelon">*</sup></label>
            <div class="col-sm-10">
                <textarea class="form-control tiny-textarea <?= ($validation->hasError('product-description') ? 'is-invalid' : ''); ?>" name="product-description"  id="product-description" rows="4" style="border-radius: 15px;">
                <?= $product['product_description']; ?>
                </textarea>
                <div class="invalid-feedback text-center">
                    <?= $validation->getError('product-description'); ?>
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