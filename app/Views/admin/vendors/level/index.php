<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendor Level</h1>
        <a href="/admin/vendors/level/add" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-plus-square mr-1"></i> Add Level</a>
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
                    <th>Level</th>
                    <th>Vendor Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Level</th>
                    <th>User Amount</th>
                    <th>Action</th>
                </tr>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($level as $l) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $l['name']; ?></td>
                        <td><?= $l['amount']; ?></td>
                        <td class="text-center">
                            <a href="/admin/vendors/level/detail/<?= $l['id']; ?>" class="btn btn-success btn-sm rounded-pill small">Detail</a>
                            <a href="/admin/vendors/level/edit/<?= $l['id']; ?>" class="btn btn-info btn-sm rounded-pill small">Edit</a>
                            <!-- <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button> -->
                            <form action="/admin/vendors/level/<?= $l['id']; ?>" method="POST" class="d-inline form-delete">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill small btn-delete" >Delete</button>
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