<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Groups</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="datagroups" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($groups as $group) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $group['name']; ?></td>
                        <td>
                            <a href="/group/detail/<?= $group['id']; ?>" class="btn btn-success btn-sm rounded-pill small text-center">Detail</a>
                            <a href="/group/edit/<?= $group['id']; ?>" class="btn btn-info btn-sm rounded-pill small text-center">Edit</a>
                            <form action="/group/<?= $group['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill small text-center" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Delete</button>
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
        $('#datagroups').DataTable();
    });
</script>
<?= $this->endSection(); ?>