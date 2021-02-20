<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Add User Roles</h1>
    </div>

    <form action="/admin/users/roles/save" method="post" class="user">
    <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user <?= ($validation->hasError('role') ? 'is-invalid' : ''); ?>" id="role" name="role" placeholder="Role">
                <div class="invalid-feedback">
                    <?= $validation->getError('role'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="active" name="active" checked >
                <label class="custom-control-label" for="active">Active?</label>
            </div>
        </div>
        <button type="submit" class="btn btn-wild-watermelon btn-user btn-sm">Save</button>
        <button type="reset" class="btn btn-secondary btn-user btn-sm">Cancel</button>
    </form>
</div>
<?= $this->endSection(); ?>