<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Permissions</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Permission</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Permission</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($permissions as $permission) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $permission['name']; ?></td>
                        <td><?= $permission['description']; ?></td>
                        <td><?= $permission['amount']; ?></td>
                        <td>
                            <div class="btn btn-success btn-sm">Active</div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                            <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </tfoot>
            <tbody>
            </tbody>
        </table>
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