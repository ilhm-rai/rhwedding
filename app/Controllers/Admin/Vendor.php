<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VendorModel;
use App\Models\UsersModel;

class Vendor extends BaseController
{

    protected $vendorModel;
    protected $usersModel;
    public function __construct()
    {
        $this->vendorModel = new VendorModel();
        $this->usersModel = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title'  => 'Vendor List | RH Wedding Planner',
            'active' => 'vendors',
            'vendors'  => $this->vendorModel->getVendor(),
        ];
        // dd($data);
        return view('admin/vendors/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Vendor | RH Wedding Planner',
            'active' => 'vendors',
            'vendor'  => $this->vendorModel->getVendorBy($id),
            'user'  => $this->usersModel->getUserByVendor($id),
        ];
        // dd($data);
        return view('admin/vendors/detail', $data);
    }
    
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Vendor | RH Wedding Planner',
            'active' => 'vendors',
            'vendor'  => $this->vendorModel->getVendorBy($id),
            'user'  => $this->usersModel->getUserByVendor($id),
        ];
        // dd($data);
        return view('admin/vendors/edit', $data);
    }
}
