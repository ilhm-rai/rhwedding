<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Add User Roles</h1>
    </div>
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
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>" id="role" name="role" placeholder="Role" value="<?= (old('role')) ? old('role') : $role['name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('role'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="4"><?= $role['description']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="active" name="active" checked >
                <label class="custom-control-label" for="active">Active?</label>
            </div>
        </div>
        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Edit</button>
        <a href="/admin/users/roles" class="btn btn-secondary btn-user btn-sm">Cancel</a>
    </form>
</div>
<?= $this->endSection(); ?>