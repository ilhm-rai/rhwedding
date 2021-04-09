<?php

use CodeIgniter\Model;

if (logged_in()) {
    $id = user()->id;
    $usersModel = Model('UsersModel');
    $vendorModel = Model('vendorModel');
    $cartModel = Model('CartModel');
    $myInfo = $usersModel->getUserBy($id);
    $myVendor = $vendorModel->getVendorByUser($id);
}
?>
<nav class="navbar main navbar-expand navbar-light topbar static-to">

    <a class="navbar-brand" href="<?= base_url('/'); ?>"><img src="<?= base_url('/img/logo.png'); ?>" alt="RH Wedding Planner"></a>

    <!-- Topbar Search -->
    <form action="/search/result" method="POST" class="search-wrapper d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 w-100 pr-4 navbar-search">
        <div class="input-group relative search-input">
            <input type="text" id="keyword" name="keyword" class="form-control search border-0 rounded-pill pl-3" placeholder="Cari sesuatu..." aria-label="Search" aria-describedby="basic-addon2" autocomplete="off">
            <button type='submit' class="btn btn-gradient-main rounded-pill position-absolute border-white" style="right: 0;">
                <i class="fas fa-search fa-sm"></i>
                <p class="d-inline ml-1">Search</p>
            </button>
        </div>
        <div class="search-suggestion p-4 d-none shadow">
            <div class="list-group list-group-flush d-none suggestVendor">
                <!-- data suggest vendor -->
            </div>
            <div class="list-group list-group-flush d-none suggestProduct">
                <!-- data sugest product -->
            </div>

            <div class="list-group list-group-flush js-no-data">
                <!-- data sugest product -->
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

       
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="nav-icon position-relative">
                    <i class="fas fa-shopping-cart fa-fw"></i>
                    <span class="badge badge-danger badge-counter rounded-circle d-none js-count-cart-item">
                        <!-- Counter - Items -->
                    </span>
                </div>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    New Items Added
                </h6>
                <div class="js-item-cart">
                    <!-- Item in Cart -->
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="/cart">Show All Items</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="nav-icon position-relative">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter rounded-circle d-none js-count-notif-item">3</span>
                </div>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notification
                </h6>
                <div class="js-item-notification">
                    <!-- Item in Notification -->
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="/notification">Show All Notification</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <?php if (logged_in()) : ?>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="vendorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($myVendor) : ?>
                        <img class="mr-2 img-profile rounded-circle" src="/img/vendors/logo/<?= $myVendor['vendor_logo']; ?>">
                        <span class="d-none d-lg-inline text-gray-600 small mr-2"><?= $myVendor['vendor_name']; ?></span>
                    <?php else : ?>
                        <img class="mr-2 img-profile rounded-circle" src="/img/vendors/logo/default.png">
                        <span class="d-none d-lg-inline text-gray-600 small mr-2">Vendor</span>
                    <?php endif; ?>
                    <span class="fa fa-angle-down text-wild-watermelon"></span>
                </a>
                <?php if ($myVendor) : ?>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in p-3" aria-labelledby="vendorDropdown">
                        <img src="/img/vendors/logo/<?= $myVendor['vendor_logo']; ?>" alt="" class="w-25">
                        <a class="text-small text-center mb-0"><?= $myVendor['vendor_name']; ?></a>
                        <div class="dropdown-divider"></div>
                        <?php if ($myInfo['role_name'] == 'Admin') : ?>
                            <a class="dropdown-item" href="/admin">
                                <button class="btn btn-sm btn-wild-watermelon">Dashboard Admin</button>
                            </a>
                        <?php else : ?>
                            <a class="dropdown-item" href="/vendors">
                                <button class="btn btn-sm btn-wild-watermelon">Dashboard Vendor</button>
                            </a>
                        <?php endif; ?>
                        <div class="col-12 text-center">
                            <a href="#" class="text-small text-center text-wild-watermelon mb-0">Upgrade my vendor</a>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in p-3" aria-labelledby="vendorDropdown">
                        <p class="text-small text-center font-weight-bold">You don't have a vendor</p>
                        <a class="dropdown-item" href="/vendor/register">
                            <button class="btn btn-sm btn-wild-watermelon">Become a vendor</button>
                        </a>
                        <a class="text-small text-center text-wild-watermelon mb-0">Learn more at vendor center</a>
                    </div>
                <?php endif ?>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="mr-2 img-profile rounded-circle" src="/img/users/profile/<?= $myInfo['user_image']; ?>">
                    <span class="d-none d-lg-inline text-gray-600 small mr-2"><?= $myInfo['full_name']; ?></span>
                    <span class="fa fa-angle-down text-wild-watermelon"></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/user/profile/<?= user()->id; ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        <?php else : ?>
            <li class="nav-item no-arrow">
                <div class="nav-link">
                    <a class="btn btn-action rounded-pill" href="<?= base_url('login'); ?>">Login</a>
                </div>
            </li>
            <li class="nav-item no-arrow">
                <div class="nav-link">
                    <a class="btn btn-wild-watermelon rounded-pill" href="<?= base_url('register'); ?>">Register</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</nav>