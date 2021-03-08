<?= $this->extend('templates/admin'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid content-frame mb-5 shadow">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="content-heading mb-0 text-gray-800">Products</h1>
        <a href="/admin/products/add" class="d-block d-sm-inline-block btn btn-wild-watermelon rounded-pill"><i class="fas fa-plus-square mr-1"></i> Add</a>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div class="dropdown d-inline-block">
                <button class="btn btn-outline-wild-watermelon rounded-pill btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vendor Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button class="btn btn-outline-wild-watermelon rounded-pill btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <button type="submit" class="btn btn-wild-watermelon rounded-pill btn-sm">Find</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered td-align-middle" id="dataProducts" width="100%" cellspacing="0">
            <thead class="th-no-border">
                <tr>
                    <th>No</th>
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </th>
                    <th width='100px'>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">&nbsp;</label>
                        </div>
                    </th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/example-1.png'); ?>" alt="" class="w-100"></td>
                    <td>ARTHAUS ASPEN</td>
                    <td>Photography</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">

                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/example-2.png'); ?>" alt="" class="w-100"></td>
                    <td>Owl Creative</td>
                    <td>Decoration</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">

                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/example-3.png'); ?>" alt="" class="w-100"></td>
                    <td>Isabel Giles</td>
                    <td>Hair&Makeup</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">

                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/example-4.png'); ?>" alt="" class="w-100"></td>
                    <td>Monica Lin</td>
                    <td>Hair&Makeup</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/logo2.png'); ?>" alt="sarovar" class="w-100"></td>
                    <td>SAROVAR</td>
                    <td>Venue</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">

                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                        </div>
                    </td>
                    <td><img src="<?= base_url('img/vendors/logo/logo1.png'); ?>" alt="grand-aston-bali" class="w-100"></td>
                    <td>GRAND ASTON BALI</td>
                    <td>Venue</td>
                    <td>Rp4.000.000,-</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Active</button>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-eye"></span><span class="d-sm-none d-lg-inline">Detail</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-pencil-alt"></span><span class="d-sm-none d-lg-inline">Edit</span></button>
                        <button type="button" class="btn btn-action btn-sm small mb-1"><span class="d-lg-none fa fa-trash"></span><span class="d-sm-none d-lg-inline">Delete</span></span></button>
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
        $('#dataProducts').DataTable();
    });
</script>
<?= $this->endSection(); ?>