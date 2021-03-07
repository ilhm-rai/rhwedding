<?= $this->extend('templates/default'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 pt-0">
    <div class="row">
        <div class="col-3">
            <ul class="navbar-nav bg-white sidebar accordion border-right pt-4" id="accordionSidebar">
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
</div>
<?= $this->endSection(); ?>