<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Detail Vendors Level</h1>
    </div>
    <a href="/admin/vendors/level/edit/<?= $level['id']; ?>" class="btn btn-wild-watermelon rounded-pill mb-3">Edit Role</a>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <form action="/admin/vendors/level/update/<?= $level['id']; ?>" method="post" class="user">
    <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Level Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Service Name" value="<?= (old('name')) ? old('name') : $level['name']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="4" readonly><?= $level['description']; ?></textarea>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th width='100px'>Logo</th>
                    <th>Vendor Name</th>
                    <th>Level</th>
                    <!-- <th>Owner</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Vendor Name</th>
                    <th>Level</th>
                    <!-- <th>Owner</th> -->
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
                    <td><?= $vendor['level']; ?></td>
                    
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