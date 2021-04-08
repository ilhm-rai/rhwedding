<?= $this->extend('templates/auth'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid overflow-hidden px-0">
    <!-- Outer Row -->
    <div class="row justify-content-center overflow-hidden" style="height: 100vh;">

        <div class="col">

            <div class="card o-hidden border-0" style="border-radius: 0;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row" style="height: 100vh;">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7 px-5">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col px-5">
                                    <div class="px-5">
                                        <div class="text-center">
                                            <img src="/img/logo.png" alt="RH Wedding Logo" class="mb-4" width="80px">
                                        </div>
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                        <form action="<?= route_to('addvendor') ?>" method="post" class="user">
                                            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                            <!-- vendor name -->
                                            <div class="form-group">
                                                <input class="form-control form-control-user <?= ($validation->hasError('vendor_name') ? 'is-invalid' : ''); ?>" id="vendor_name" name="vendor_name" placeholder="Vendor Name" value="<?= old('vendor_name'); ?>" autofocus>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('vendor_name'); ?>
                                                </div>
                                            </div>
                                            <!-- contact vendor -->
                                            <div class="form-group">
                                                <input class="form-control form-control-user <?= ($validation->hasError('contact_vendor') ? 'is-invalid' : ''); ?>" id="contact_vendor" name="contact_vendor" placeholder="Contact Vendor" value="<?= old('contact_vendor'); ?>" autofocus>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('contact_vendor'); ?>
                                                </div>
                                            </div>
                                            <!-- city -->
                                            <div class="form-group">
                                                <input class="form-control form-control-user <?= ($validation->hasError('city') ? 'is-invalid' : ''); ?>" id="city" name="city" placeholder="City" value="<?= old('city'); ?>" autofocus>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('city'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder='Vendor address' name='address' id="address" rows="5" style="border-radius: 20px;"><?= old('address'); ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('address'); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="/" class="btn btn-google bg-light border btn-user btn-block text-body">
                                                        Cancel
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-wild-watermelon btn-user btn-block">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row justify-content-center mt-3">
                                            <div class="col-10 text-center">
                                                <p class="text-small"> By registering I agree to RH Wedding's <a href="" class="text-wild-watermelon">terms and conditions</a> and <a href="" class="text-wild-watermelon">privacy policy</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection(); ?>