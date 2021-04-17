<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">My Order</h1>
    </div>
    <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Date</th>
                    <th>Amount Item</th>
                    <th>Total Pay</th>
                    <th>Payment Accept</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($transactions as $trans): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $trans['transaction_code']; ?></td>
                    <td><?= $trans['created_at']; ?></td>
                    <td><?= $trans['amount']; ?></td>
                    <td><?= $trans['total_pay']; ?></td>
                    <td><?= $trans['subtotal']; ?></td>
                    <td>
                    <a href="/order/<?= $trans['transaction_code']; ?>" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail Order</span></a>
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
