<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Transaction History</h1>
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
                    <th>Payment Type</th>
                    <th>Transaction Time</th>
                    <th>Bank</th>
                    <th>VA Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Gross Amount</th>
                    <th>Payment Type</th>
                    <th>Transaction Time</th>
                    <th>Bank</th>
                    <th>VA Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transactions as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $t['order_id']; ?></td>
                        <td>Rp<?= number_format($t['gross_amount'], 0, ',', '.'); ?>,-</td>
                        <td><?= $t['payment_type']; ?></td>
                        <td><?= date("d-m-Y", strtotime($t['transaction_time'])); ?></td>
                        <td><?= $t['bank']; ?></td>
                        <td><?= $t['va_number']; ?></td>

                        <?php if($t['status_code'] == 200) : ?>
                        <td>
                            <span class="badge badge-pill badge-success">Success</span> 
                        </td>
                        <?php else : ?>
                        <td>
                            <span class="badge badge-pill badge-warning">Pending</span> 
                        </td>
                        <?php endif; ?>
                        <td class="text-center">
                        <a href="<?= $t['pdf_url']; ?>" target='blank' class="btn btn-action btn-sm small mb-1"><i class="fas fa-print"></i></a>
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
