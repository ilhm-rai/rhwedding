<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\VendorModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{

    protected $usersModel;
    protected $vendorModel;
    protected $productModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $data= [
            'title' => 'Dashboard',
            'active' => 'dashboard admin',
            'total_user' => $this->usersModel->countAll(),            
            'total_vendor' => $this->vendorModel->countAll(),  
            'total_product' => $this->productModel->countAll(),
            'total_transaction' => $this->transactionModel->countAll(),
            'earnings' => $this->transactionModel->getEarnings()         
        ];

        return view('admin/dashboard', $data);
    }
}
