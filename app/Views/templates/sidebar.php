<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('img/logo.png'); ?>" alt="RH Logo Wedding" width="50px">
        </div>
    </a>

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">
        <a class="nav-link active" href="/admin">
            <div class="nav-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-user"></i>
            </div>
            <span>Users</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/users" class="collapse-item">User List</a>
                <a href="/admin/users/roles" class="collapse-item">User Roles</a>
                <a href="/admin/users/permissions" class="collapse-item">User Permissions</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
                <i class="fas fa-fw fa-users"></i>
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
      <!-- Heading -->
    <div class="sidebar-heading">
        Vendor
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShop" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
            <i class="fas fa-fw fa-store"></i>
            </div>
            <span>My Vendor</span>
        </a>
        <div id="collapseShop" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/vendors" class="collapse-item">Vendor Profile</a>
                <a href="/admin/vendors" class="collapse-item">Vendor Service</a>
                <a href="/admin/vendors" class="collapse-item">Vendor Rating</a>
                <a href="/admin/vendors" class="collapse-item">Vendor Decoration</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseUser">
            <div class="nav-icon">
            <i class="fas fa-fw fa-store"></i>
            </div>
            <span>Product</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <a href="/admin/vendors" class="collapse-item">Product List</a>
                <a href="/admin/vendors" class="collapse-item">Product Catalog</a>
                <a href="/admin/vendors" class="collapse-item">Product Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-shopping-bag"></i>
            </div>
            <span>Product</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-calendar"></i>
            </div>
            <span>Calendar</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Transaction
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <span>Order & Shop</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-percentage"></i>
            </div>
            <span>Discount</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-chart-line"></i>
            </div>
            <span>Income</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <div class="nav-icon">
                <i class="fas fa-fw fa-file-alt"></i>
            </div>
            <span>Report</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle sidebar-toggler" id="sidebarToggle"></button>
    </div>

</ul>