<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Roles</h1>
    </div>
    <a href="/admin/users/roles/add" class="btn btn-wild-watermelon rounded-pill mb-3">Add New Role</a>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($roles as $role) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $role['name']; ?></td>
                        <td><?= $role['description']; ?></td>
                        <td><?= $role['amount']; ?></td>
                        <td> 
                            <button type="button" class="btn btn-sm <?= ($role['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($role['active'] == 1) ? 'Active' : 'Disable'; ?></button>
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