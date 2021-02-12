<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendor Services</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataVendorServices" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Serivce</th>
                    <th>Description</th>
                    <th>Vendor Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Serivce</th>
                    <th>Description</th>
                    <th>Vendor Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Wedding Organizer</td>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>4</td>
                        <td>
                            <div class="btn btn-success btn-sm">Active</div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                            <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Venue</td>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>4</td>
                        <td>
                            <div class="btn btn-success btn-sm">Active</div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                            <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Decoration</td>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>4</td>
                        <td>
                            <div class="btn btn-success btn-sm">Active</div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                            <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dress & Attire</td>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>4</td>
                        <td>
                            <div class="btn btn-success btn-sm">Active</div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                            <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </tfoot>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataVendorServices').DataTable();
    });
</script>
<?= $this->endSection(); ?>