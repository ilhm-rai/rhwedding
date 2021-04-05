<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Products</h1>
        <a href="/vendors/products/add" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill"><i class="fas fa-plus-square mr-1"></i> Add New Product</a>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="row mb-4">
        <div class="col">
            <div class="dropdown d-inline-block">
                <button class="btn btn-outline-wild-watermelon rounded-pill btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Service Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php foreach($services as $s) : ?>
                    <a class="dropdown-item" href="#"><?= $s['service_name']; ?></a>
                <?php endforeach; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-wild-watermelon rounded-pill btn-sm">Find</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataProducts" width="100%" cellspacing="0">
            <thead class="th-no-border">
                <tr>
                    <th>No</th>
                    <th width='100px'>Image</th>
                    <th>Product Name</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($products as $product): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="/img/products/main-img/<?= $product['product_main_image']; ?>" alt="" class="w-100"></td>
                    <td><?= $product['product_name']; ?></td>
                    <td><?= $product['service_name']; ?></td>
                    <td>Rp<?= number_format($product['price'],0,',','.'); ?>,-</td>
                    <td> <button type="button" class="btn <?= ($product['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($product['active'] == 1) ? 'Active' : 'Disable'; ?></button></td>
                    <td class="text-center">
                            <a href="/vendors/products/detail/<?= $product['slug']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                            <a href="/vendors/products/edit/<?= $product['slug']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                            <form action="/vendors/products/<?= $product['id']; ?>" method="POST" class="d-inline form-delete">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                            </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataProducts').DataTable();
    });
</script>
<?= $this->endSection(); ?>