<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendors</h1>
        <a href="#" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-plus-square mr-1"></i> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th width='100px'>Logo</th>
                    <th>Vendor Name</th>
                    <th>Vendor Code</th>
                    <th>Level</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Vendor Name</th>
                    <th>Vendor Code</th>
                    <th>Level</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($vendors as $vendor): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="w-100"></td>
                    <td><?= $vendor['vendor_name']; ?></td>
                    <td><?= $vendor['vendor_code']; ?></td>
                    <td><?= $vendor['level_name']; ?></td>
                    <td><?= $vendor['owner']; ?></td>
                    <td class="text-center">
                        <a href="/admin/vendors/detail/<?= $vendor['id']; ?>" class="btn btn-success btn-sm rounded-pill small">Detail</a>
                        <a href="/admin/vendors/edit/<?= $vendor['id']; ?>" class="btn btn-info btn-sm rounded-pill small">Edit</a>
                        <form action="/admin/vendors/<?= $vendor['id']; ?>" method="POST" class="d-inline form-delete">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill small btn-delete" >Delete</button>
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
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>