<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\VendorModel;
use App\Models\ProductModel;

class Dashboard extends BaseController
{

    protected $usersModel;
    protected $vendorModel;
    protected $productModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data= [
            'title' => 'Dashboard',
            'active' => 'dashboard admin',
            'total_user' => $this->usersModel->countAll(),            
            'total_vendor' => $this->vendorModel->countAll(),  
            'total_product' => $this->productModel->countAll(),          
        ];
        return view('admin/dashboard', $data);
    }
}
