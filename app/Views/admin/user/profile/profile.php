<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Profile</h1>
    </div>
    <div class="row">
        <div class="col-3">
            <ul class="navbar-nav bg-white sidebar accordion border-right pt-4 no-toggled" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link active"  href="/admin/users/profile/<?= $user['id']; ?>">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users/vendor/<?= $user['id']; ?>">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-store"></i>
                        </div>
                        <span class="">Vendor</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col pt-4">
        <form>
            <div class="row mb-5 align-items-center">
                <div class="col-2">
                    <img src="/img/users/profile/<?= $user['user_image']; ?>" alt="" class="img-profile" width="100px">
                </div>
                <div class="col">
                    <h4 class="font-weight-bold mb-1"><?= $user['full_name']; ?></h4>
                    <p><?= $user['email']; ?></p>
                    <span class="badge badge-geyser p-2"><?= $user['role_name']; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    
                        <div class="form-group">
                            <label for="fullname" class="pl-3">Fullname</label>
                            <input type="text" class="form-control rounded-pill" name="fullname" id="fullname" value="<?= $user['full_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="pl-3">Username</label>
                            <input type="text" class="form-control rounded-pill" name="username" id="username" value="<?= $user['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="pl-3">Email</label>
                            <input type="email" class="form-control rounded-pill <?= ($user['active'] == 1) ? 'is-valid' : 'is-invalid'; ?>" name="email" id="email" aria-describedby="emailHelp" value="<?= $user['email']; ?>">
                            <div class="valid-feedback">
                                Email Verified!
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="pl-3">Contact</label>
                            <input type="text" class="form-control rounded-pill" name="contact" id="contact" value="<?= $user['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address" class="pl-3">Address</label>
                            <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;"><?= $user['address']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-wild-watermelon rounded-pill">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <div class="container-fluid content-frame mb-5 pt-0">
    <div class="row">
        <div class="col-3">
            <ul class="navbar-nav bg-white sidebar accordion border-right pt-4 no-toggled" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link active" href="/admin">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-store"></i>
                        </div>
                        <span class="">Vendor</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col pt-4">
            <div class="row mb-5 align-items-center">
                <div class="col-2">
                    <img src="/img/undraw_profile_1.svg" alt="" class="img-profile" width="100px">
                </div>
                <div class="col">
                    <p class="font-weight-bold">Thomas</p>
                    <p>thomasjulio@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control rounded-pill" id="fullname">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control rounded-pill" id="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control rounded-pill border-success" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-success">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control rounded-pill" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-wild-watermelon rounded-pill">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>