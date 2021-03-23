<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">My Service</h1>
        <a href="#" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill"><i class="fas fa-plus-square mr-1"></i> Add</a>
    </div>

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('message'); ?>"></div>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataProducts" width="100%" cellspacing="0">
            <thead class="th-no-border">
                <tr>
                    <th>No</th>
                    <th>Service</th>
                    <th width="20px">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Service</th>
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($services as $service): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $service['name']; ?></td>
                    <?php 
                    $serve = false;
                    foreach ($myservices as $ms) {
                        if($service['id'] == $ms['id']){
                            $serve = true;
                        }
                    }                    
                    ?>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" data-id="<?= ($serve==true)?$ms['id']:''; ?>" data-vendor="<?= $vendor['vendor_id']; ?>" data-service="<?= $service['id']; ?>" class="custom-control-input serviceCheckbox" id="customCheck<?= $i; ?>" <?= ($serve==true)?'checked':''; ?>>
                            <label class="custom-control-label" for="customCheck<?= $i; ?>">&nbsp;</label>
                        </div>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
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
        $('#dataProducts').DataTable();
    });
    


    // checkbox service
    $(".serviceCheckbox").on("click", function () {
        const vendorId = $(this).data("vendor");
        const serviceId = $(this).data("service");
        console.log(vendorId, serviceId);
        $.ajax({
            url: "<?= base_url('/vendors/myvendor/service/add')?>",
            type: 'post',
            data : {
                vendorId: vendorId,
                serviceId: serviceId
            },
            success: function() {
				console.log('ok');
                document.location.href = "<?= base_url('/vendors/myvendor/service/'); ?>";
			}
        })
    });


</script>
<?= $this->endSection(); ?>