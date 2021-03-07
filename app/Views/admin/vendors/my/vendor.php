<?= $this->extend('templates/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 pt-0">
    <div class="row">
        <div class="col-3">
            <ul class="navbar-nav bg-white sidebar accordion border-right pt-4" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/admin">
                        <div class="nav-icon">
                            <i class="fas fa-fw fa-store"></i>
                        </div>
                        <span class="">Vendor</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col pt-4">
            <div class="row mb-4 align-items-center">
                <div class="col-2">
                    <img src="/img/vendors/logo/logo.png" alt="" class="img-profile" width="100px">
                </div>
                <div class="col">
                    <p class="font-weight-bold">RH Wedding Planner</p>
                    <span class="badge badge-geyser p-2">Platinum Vendor</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="/img/jumbotron-admin.jpg" alt="" class="img-fluid mb-4">
                    <form>
                        <div class="form-group">
                            <label for="owner">Owner</label>
                            <input type="text" class="form-control rounded-pill" id="owner">
                        </div>
                        <div class="form-group">
                            <label for="services">Services</label>
                            <div class="service-group d-block ml-3">
                                <span class="badge badge-geyser p-2">Wedding Planner</span>
                                <span class="badge badge-geyser p-2">Makeup Artist</span>
                                <a href="#" class="badge badge-geyser p-2"><span class="fa fa-plus"></span></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" rows="5" style="border-radius: 20px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="5" style="border-radius: 20px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-wild-watermelon rounded">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>