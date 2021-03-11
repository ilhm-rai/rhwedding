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
            'user'  => $this->usersModel->getUserByVendor($id),
        ];
        // dd($data);
        return view('admin/vendors/detail', $data);
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
