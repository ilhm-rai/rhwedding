<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Order & </h1>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Payment</th>
                    <th>Total Item</th>
                    <th>Event Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Payment</th>
                    <th>Total Item</th>
                    <th>Event Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
            <?php $i = 1; ?>
                <?php foreach ($trans as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $t['transaction_code']; ?></td>
                        <td><?= $t['payment']; ?></td>
                        <td><?= $t['amount']; ?></td>
                        <td><?= $t['event_date']; ?></td>
                        <td class="text-center">
                            <a href="/transaction/detail/<?= $t['transaction_code']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></a>
                            <a href="/transaction/edit/<?= $t['transaction_code']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></a>
                            <form action="/transaction/<?= $t['transaction_code']; ?>" method="POST" class="d-inline form-delete">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-action btn-sm small mb-1 btn-delete"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
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