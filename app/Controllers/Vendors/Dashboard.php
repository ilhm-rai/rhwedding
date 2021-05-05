<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\VendorModel;
use App\Models\TransDetailModel;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{
    protected $vendorModel;
    protected $transDetailModel;
    protected $transactionModel;

    public function __construct() {
        $this->vendorModel = new VendorModel();
        $this->transDetailModel = new TransDetailModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $myVendorId = $this->vendorModel->getMyVendorId();

        $data =[
            'title' => 'dashboard',
            'active' => 'dashboard vendor',
            'customers' => $this->transDetailModel->getMyCustomer($myVendorId),
            'earnings' => $this->transactionModel->getVendorEarnings($myVendorId)
        ];
        return view('vendors/dashboard', $data);
    }
}
