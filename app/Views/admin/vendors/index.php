<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendors</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th width='50px'>Logo</th>
                    <th>Vendor Name</th>
                    <th>Vendor Code</th>
                    <th>Level</th>
                    <th>Owner</th>
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
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($vendors as $vendor) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><img src="/img/vendors/logo/<?= $vendor['vendor_logo']; ?>" alt="" class="w-100"></td>
                        <td><?= $vendor['vendor_name']; ?></td>
                        <td><?= $vendor['vendor_code']; ?></td>
                        <td><?= $vendor['level_name']; ?></td>
                        <td><?= $vendor['owner']; ?></td>
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