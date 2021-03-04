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

    public function detail($id)
    {
        $data = [
            'title'  => 'My Vendor',
            'vendor'  => $this->vendorModel->getVendorBy($id),
        ];
        // dd($data);
        return view('admin/vendors/detail', $data);
    }
}
