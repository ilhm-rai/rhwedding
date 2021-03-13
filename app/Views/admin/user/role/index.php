<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Roles</h1>
        <a href="/admin/users/roles/add" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-plus-square mr-1"></i> Add</a>
    </div>

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>User Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                    <th>User Amount</th>
                    <th>Action</th>
                </tr>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($roles as $role) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $role['name']; ?></td>
                        <td><?= $role['amount']; ?></td>
                        <td class="text-center">
                            <a href="/admin/users/roles/detail/<?= $role['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                            <a href="/admin/users/roles/edit/<?= $role['id']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                            <form action="/admin/users/roles/<?= $role['id']; ?>" method="POST" class="d-inline form-delete">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                            </form>
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