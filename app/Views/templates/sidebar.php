<?php
if (logged_in()) {
    $id = user()->id;
    $usersModel = Model('UsersModel');
    $myInfo = $usersModel->getUserBy($id);
}
?>
<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('img/logo.png'); ?>" alt="RH Logo Wedding" width="50px">
        </div>
    </a>
    <?php if ($myInfo['role_name'] == 'Admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <li class="nav-item">
            <a class="nav-link <?= ($active == 'dashboard admin') ? 'active' : ''; ?>" href="/admin">
                <div class="nav-icon">
                    <i class="fas fa-fw fa-home"></i>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed <?= ($active == 'users') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                <div class="nav-icon">
                    <i class="fas fa-fw fa-user"></i>
                </div>
                <span>Users</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <a href="/admin/users" class="collapse-item">User List</a>
                    <a href="/admin/users/roles" class="collapse-item">User Roles</a>
                    <!-- <a href="/admin/users/permissions" class="collapse-item">User Permissions</a> -->
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed <?= ($active == 'vendors') ? 'active' : ''; ?>" href="#" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="true" aria-controls="collapseUser">
                <div class="nav-icon">
                    <i class="fas fa-fw fa-store"></i>
                </div>
                <span>Vendors</span>
            </a>
            <div id="collapseVendor" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <a href="/admin/vendors" class="collapse-item">Vendor List</a>
                    <a href="/admin/vendors/services" class="collapse-item">Vendor Services</a>
                    <a href="/admin/vendors/level" class="collapse-item">Vendor Level</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link php <?= ($active == 'products')?'active':''; ?>" href="/admin/products">
                <div class="nav-icon">
                    <i class="fas fa-fw fa-box-open"></i>
                </div>
                <span>Products</span>
            </a>
        </li> 
        <li class="nav-item">
            <a class="nav-link <?= ($active == 'order') ? 'active' : ''; ?>" href="/transaction">
                <div class="nav-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <span>Order & Shop</span>
            </a>
        </li>
    <?php endif; ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Vendor
    </div>
    <li class="nav-item">
        <a class="nav-link <?= ($active == 'dashboard vendor') ? 'active' : ''; ?>" href="/vendors">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($active == 'vendor') ? 'active' : ''; ?>" href="/vendors/myvendor">
            <div class="nav-icon">
                <i class="fas fa-fw fa-store"></i>
            </div>
            <span>My Vendor</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link php <?= ($active == 'vendor_product') ? 'active' : ''; ?>" href="/vendors/products">
            <div class="nav-icon">
                <i class="fas fa-fw fa-box-open"></i>
            </div>
            <span>Product</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($active == 'vendor_order') ? 'active' : ''; ?>" href="/vendors/transaction">
            <div class="nav-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <span>Order & Shop</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle sidebar-toggler" id="sidebarToggle"></button>
    </div>

</ul>