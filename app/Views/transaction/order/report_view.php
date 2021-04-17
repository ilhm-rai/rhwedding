<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-3">
    <?= form_open('', ['method' => 'POST']) ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="start-date">Start date</label>
                <div class='input-group date' id='start-date'>
                    <input id="start-date" type='text' name="start_date" value="<?= (@$_POST['start_date']) ? $_POST['start_date'] : ''; ?>" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-calendar-alt"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="end-date">End date</label>
                <div class='input-group date' id='end-date'>
                    <input id="end-date" type='text' name="end_date" value="<?= (@$_POST['end_date']) ? $_POST['end_date'] : ''; ?>" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-calendar-alt"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" name="preview-data" class="btn btn-action"><span class="fas fa-eye mr-1"></span> Preview</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>

<?php

use App\Models\TransactionModel;

$TransactionModel = new TransactionModel();
?>

<?php if (isset($_POST['preview-data'])) : ?>
    <?php
    $total = 0;
    $soldProducts = $TransactionModel->getSoldProductBetweenDate($_POST['start_date'], $_POST['end_date']);
    ?>
    <div class="container-fluid content-frame">
        <div class="row">
            <div class="col">
                <a href="/vendors/transaction/report/<?= date('Y-m-d', strtotime($_POST['start_date'])); ?>/<?= date('Y-m-d', strtotime($_POST['end_date'])); ?>" target="_blink" name="preview-data" class="btn btn-primary"><span class="fas fa-file-pdf mr-1"></span> Export to PDF</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Service</th>
                            <th scope="col">Payment Date</th>
                            <th tscope="col">Price (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($soldProducts as $soldIndex => $soldProduct) : ?>
                            <?php $total += $soldProduct['price']; ?>
                            <tr>
                                <th scope="row"><?= ++$soldIndex; ?></th>
                                <td><?= $soldProduct['product_code']; ?></td>
                                <td><?= $soldProduct['product_name']; ?></td>
                                <td><?= $soldProduct['service_name']; ?></td>
                                <td><?= $soldProduct['payment_date']; ?></td>
                                <td><?= number_format($soldProduct['price'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" colspan="5">Total</th>
                            <th scope="col"><?= number_format($total, 0, ',', '.'); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('.date').datetimepicker({
        format: 'L',
        useCurrent: false,
    });

    $('#start-date').data("DateTimePicker").minDate('<?= $date_min ?>');
    $('#end-date').data("DateTimePicker").minDate('<?= $date_min ?>');
</script>
<?= $this->endSection(); ?>