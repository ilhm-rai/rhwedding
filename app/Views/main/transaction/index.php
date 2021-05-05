<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">My Order</h1>
        <a href="/transaction/history" class="d-block d-sm-inline-block btn btn-wild-watermelon"><i class="fas fa-history mr-1"></i>Transaction History</a>
    </div>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Gross Amount</th>
                    <th>Amount Item</th>
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
                    <th>Gross Amount</th>
                    <th>Amount Item</th>
                    <th>Item Confirmed</th>
                    <th>Event Date</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transactions as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $t['transaction_code']; ?></td>
                        <td>Rp<?= number_format($t['cash_in'], 0, ',', '.'); ?>,-</td>
                        <td><?= $t['amount_item']; ?></td>
                        <td><?= $t['item_confirmed']; ?></td>
                        <td><?= date("d-m-Y", strtotime($t['event_date'])); ?></td>
                        <td><?= ($t['payment_status'] > 0) ? 'Paid' : 'Unpaid' ?></td>
                        <td class="text-center">
                        <a href="/order/<?= $t['transaction_code']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail Order</span></a>
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
