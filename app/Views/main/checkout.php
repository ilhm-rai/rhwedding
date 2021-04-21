<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<?php
$isUserOrderVenue = isUserOrderVenue($items);

$event_address = $user['address'];
$address_from = 'Main';

if ($isUserOrderVenue == true) {
    foreach ($items as $item) {
        $event_address = $item['vendor_address'];
    }
    $address_from = 'Venue';
}

function isUserOrderVenue(array $items)
{
    foreach ($items as $item) {
        $result = ($item['service_name'] == 'Venue') ? true : false;
    }

    return $result;
}
?>

<div class="container-fluid">
    <h1 class="main-product-title mb-4">Checkout</h1>
    <!-- product per vendor -->
    <div class="content-frame mb-5 shadow">
        <p class="font-weight-bold text-wild-watermelon">Wedding Address</p>
        <!-- card product list -->
        <div class="content-frame mb-3 shadow pb-0 pt-0">
            <div class="card card-product">
                <div class="row align-items-center justify-content-between">
                    <div class="card-body col-6">
                        <p class="font-weight-bold mb-0"><?= $user['full_name']; ?> <span class="badge badge-neon p-2"><?= $address_from; ?> Address</span></p>
                        <p class="mb-0"><?= $user['contact']; ?></p>
                        <?php
                        if ($event_address) {
                            echo "<p>$event_address</p>";
                        } else {
                            echo "<p class='text-danger'>Add event address!</p>";
                        }
                        ?>
                    </div>
                    <div class="col-2 text-center">
                        <?php if ($address_from != 'Venue') : ?>
                            <a href="#" data-toggle="modal" data-target="#changeAddress" class="btn btn-info rounded-pill"><i class="fas <?= ($event_address) ? 'fa-pen' : 'fa-plus'; ?> mr-1"></i> <?= ($event_address) ? 'Change' : 'Add'; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-frame mb-5 shadow">
        <p class="font-weight-bold text-wild-watermelon">Wedding Date</p>
        <?= form_open('checkout/order', ['id' => 'form-order', 'method' => 'post']) ?>
        <input type="hidden" name="event_address" value="<?= $event_address; ?>">
        <input type="hidden" name="items_id">
        <div class="row">
            <div class='col-sm-6'>
                <div class='input-group date' id='event-date'>
                    <input type='text' name="event_date" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-calendar-alt"></span>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class='input-group date' id='event-time'>
                    <input type='text' name="event_time" class="form-control" />
                    <div class="input-group-append input-group-addon">
                        <span class="input-group-text fa fa-clock"></span>
                    </div>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>
    <!-- product per vendor -->
    <div class="js-item-checkout">
    </div>
    <div class="row justify-content-end mb-5">
        <div class="col-4">
            <h4 class="text-wild-watermelon font-weight-bolder">Shopping Summary</h4>
            <table class="shop-summary mt-4" width="100%">
                <tr>
                    <td class="field">Total :</td>
                    <td class="text-wild-watermelon font-weight-bold js-total"></td>
                </tr>
            </table>
            <input type="submit" name="order" form="form-order" class="btn btn-wild-watermelon mt-5" value="Continue Order">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changeAddress" tabindex="-1" role="dialog" aria-labelledby="changeAddressLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/users/edit/address" method="POST" class="">
                <div class="modal-body">
                    <input type="hidden" name="detail-id" id='detail-id'>
                    <!-- modal content -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea rows="4" class="text-left form-control" name="address" id="address"><?= old('address'); ?></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-action" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-wild-watermelon">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#event-date').datetimepicker({
        format: 'L'
    });

    $('#event-time').datetimepicker({
        format: 'LT'
    });

    getCheckoutItem();
</script>
<?= $this->endSection(); ?>