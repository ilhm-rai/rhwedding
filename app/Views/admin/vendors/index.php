<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Vendors</h1>
        <a href="#" class="d-block d-sm-inline-block btn rounded-pill btn-wild-watermelon"><i class="fas fa-plus-square mr-1"></i> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataVendors" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th width='100px'>Logo</th>
                    <th>Vendor Name</th>
                    <th>Service</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Vendor Name</th>
                    <th>Service</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="<?= base_url('img/vendors/example-1.png'); ?>" alt="" class="w-100"></td>
                    <td>ARTHAUS ASPEN</td>
                    <td>Photography</td>
                    <td>Tasikmalaya</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="<?= base_url('img/vendors/example-2.jpg'); ?>" alt="" class="w-100"></td>
                    <td>Owl Creative</td>
                    <td>Decoration</td>
                    <td>Tasikmalaya</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="<?= base_url('img/vendors/example-3.jpg'); ?>" alt="" class="w-100"></td>
                    <td>Isabel Giles</td>
                    <td>Hair&Makeup</td>
                    <td>Tasikmalaya</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><img src="<?= base_url('img/vendors/example-4.png'); ?>" alt="" class="w-100"></td>
                    <td>Monica Lin</td>
                    <td>Hair&Makeup</td>
                    <td>Tasikmalaya</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><img src="<?= base_url('img/vendors/example-5.png'); ?>" alt="grand-aston-bali" class="w-100"></td>
                    <td>SAROVAR</td>
                    <td>Venue</td>
                    <td>Bandung</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><img src="<?= base_url('img/vendors/example-6.png'); ?>" alt="" class="w-100"></td>
                    <td>GRAND ASTON BALI</td>
                    <td>Venue</td>
                    <td>Bali</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm rounded-pill small">Detail</button>
                        <button type="button" class="btn btn-info btn-sm rounded-pill small">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill small">Delete</button>
                    </td>
                </tr>
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