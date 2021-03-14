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
                        <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-7 px-5">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col px-5">
                                    <div class="px-5">
                                        <div class="text-center">
                                            <img src="/img/logo.png" alt="RH Wedding Logo" class="mb-4" width="80px">
                                        </div>
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                        <form action="<?= route_to('login') ?>" method="post" class="user">
                                            <?= csrf_field() ?>
                                            <?php if ($config->validFields === ['email']) : ?>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" autofocus>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" autofocus>
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="exampleInputPassword" placeholder="Password">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>

                                            <?php if ($config->allowRemembering) : ?>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <button type="submit" class="btn btn-wild-watermelon btn-user btn-block">
                                                Sign In
                                            </button>
                                            <hr>
                                            <p class="mb-4 small text-center">You can use the account and password
                                                below to sign in</p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="index.html" class="btn btn-google bg-light border btn-user btn-block text-body">
                                                        <i class="fab fa-google fa-fw"></i> Google
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                        <i class="fab fa-facebook-f fa-fw"></i> Facebook
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                        <?php if ($config->activeResetter) : ?>
                                            <div class="text-center mb-2 mt-4">
                                                <a class="small text-body" href="<?= route_to('forgot') ?>">Forgot
                                                    Password?</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($config->allowRegistration) : ?>
                                            <div class="text-center small">
                                                No account? <a class="text-wild-watermelon" href="<?= route_to('register') ?>">
                                                    Create one! </a>
                                            </div>
                                        <?php endif; ?>
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