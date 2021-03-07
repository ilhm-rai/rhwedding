<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VendorModel;

class Vendor extends BaseController
{

    protected $vendorModel;
    public function __construct()
    {
        $this->vendorModel = new VendorModel();
    }
    public function index()
    {
        $data = [
            'title'  => 'Vendor List | RH Wedding Planner',
            'vendors'  => $this->vendorModel->getVendor(),
        ];
        // dd($data);
        return view('admin/vendors/index', $data);
    }

    public function myVendor()
    {
        $data = [
            'title'  => 'My Vendor | RH Wedding Planner',
        ];
        return view('admin/vendors/my/vendor', $data);
    }

    public function service()
    {
        $data = [
            'title'  => 'My Service | RH Wedding Planner',
        ];
        return view('admin/vendors/my/service', $data);
    }
}
