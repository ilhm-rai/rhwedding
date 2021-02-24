<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\serviceModel;

class VendorService extends BaseController
{

    protected $serviceModel;
   
    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User Roles | RH Wedding Planner',
            'services'  => $this->serviceModel->getServices()
        ];
        return view('admin/vendors/service/index', $data);
    }
}
