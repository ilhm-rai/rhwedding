<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail User</h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <ul class="navbar-nav bg-white sidebar border-right">
                <li class="nav-item">
                    <a class="nav-link active" href="/admin/user/detail/<?= $user['id']; ?>">
                        <div class="row">
                            <div class="nav-icon mr-3">
                                <i class="fas fa-fw fa-user"></i>
                            </div>
                            <div class="nav-text">
                                <span>Profile</span>
                                <p class="text-info">Personal informations</p>
                            </div>
                        </div>
                        <hr class="sidebar-divider mt-0">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user/vendoruser/<?= $user['id']; ?>">
                        <div class="row">
                            <div class="nav-icon mr-3">
                                <i class="fas fa-fw fa-users"></i>
                            </div>
                            <div class="nav-text">
                                <span>vendor</span>
                                <p class="text-info">Vendor informations</p>
                            </div>
                        </div>
                        <hr class="sidebar-divider mt-0">
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 container">
            <h4 class="text-gray-800 font-weight-bold">Personal Informations</h4>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <form action="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <img src="/img/<?= $user['user_image']; ?>" class="img-thumbnail img-preview mb-3" alt="">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <!-- <div class="invalid-feedback"></div> -->
                            <label class="custom-file-label" for="image"><?= $user['user_image']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFullname">Username</label>
                    <input type="text" class="form-control" id="inputFullname" value="<?= $user['full_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" value="<?= $user['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control <?= ($user['active'] == 1) ? 'is-valid' : 'is-invalid'; ?>" id="inputEmail" value="<?= $user['email']; ?>">
                    <div class="valid-feedback">
                        Email Verified!
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact">Contct</label>
                    <input type="telp" class="form-control" id="contact" value="<?= $user['contact']; ?>">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="telp" class="form-control" id="postal_code" value="<?= $user['postal_code']; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="address" name="address" rows="4" ><?= $user['address']; ?></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection(); ?>