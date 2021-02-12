<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">User Permissions</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataUsers" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Permission</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Permission</th>
                    <th>Description</th>
                    <th>User Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Administrator</td>
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
                        <td>Cashier</td>
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
                        <td>Vendor</td>
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
                        <td>User</td>
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
            <tbody>
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