<?= $this->extend('templates/main'); ?>


<?= $this->section('content'); ?>

<table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th width='50px'>Logo</th>
                    <th>Vendor Name</th>
                    <th>Vendor Code</th>
                    <th>Level</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Vendor Name</th>
                    <th>Vendor Code</th>
                    <th>Level</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
               
            </tbody>
        </table>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendors').DataTable();
    });
</script>
<?= $this->endSection(); ?>
