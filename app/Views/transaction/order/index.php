<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Order & Shop</h1>
        <a href="/vendors/transaction/report" class="d-block d-sm-inline-block btn btn-wild-watermelon"><i class="fas fa-file-alt mr-1"></i> Report</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Cash In</th>
                    <th>Item Confirmed</th>
                    <th>Event Date</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Cash In</th>
                    <th>Item Confirmed</th>
                    <th>Event Date</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($trans as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $t['transaction_code']; ?></td>
                        <td>Rp<?= number_format($t['cash_in'], 0, ',', '.'); ?>,-</td>
                        <td><?= $t['item_confirmed']; ?></td>
                        <td><?= date("d-m-Y", strtotime($t['event_date'])); ?></td>
                        <td><?= ($t['payment_status'] > 0) ? 'Paid' : 'Unpaid' ?></td>
                        <td class="text-center">
                            <a href="/vendors/transaction/confirm/<?= $t['transaction_code']; ?>" class="btn btn-success btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Confirm Transaction</span></a>
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