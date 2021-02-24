<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail User Roles</h1>
    </div>
    <a href="/admin/users/roles/edit/<?= $role['id']; ?>" class="btn btn-wild-watermelon rounded-pill mb-3">Edit Role</a>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <form action="/admin/users/roles/update/<?= $role['id']; ?>" method="post" class="user">
    <?= csrf_field(); ?>
    <!-- <input type="hidden" name="id" value="<?= $role['id']; ?>"> -->
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="role" name="role" placeholder="Role" value="<?= (old('role')) ? old('role') : $role['name']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="4" readonly><?= $role['description']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-sm <?= ($role['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($role['active'] == 1) ? 'Active' : 'Disable'; ?></button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['role_name']; ?></td>
                        <td> <button type="button" class="btn <?= ($user['active'] == 1) ? 'btn-success' : 'btn-warning'; ?> btn-sm small"><?= ($user['active'] == 1) ? 'Active' : 'Disable'; ?></button></td>
                        <td class="text-center">
                            <a href="/admin/user/detail/<?= $user['username']; ?>" class="btn btn-success btn-sm rounded-pill small">Detail</a>
                            <a href="/admin/user/edit/<?= $user['username']; ?>" class="btn btn-info btn-sm rounded-pill small">Edit</a>
                            <form action="/user/<?= $user['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill small" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</button>
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
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection(); ?>