<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\VendorModel;
use App\Models\ServiceModel;


class Myvendor extends BaseController

{

    protected $usersModel;
    protected $vendorModel;  
    protected $serviceModel;


    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
          $data = [
            'title'  => 'My Vendor',
            'user'  => $this->usersModel->getUser(user()->id),
            'vendor'  => $this->vendorModel->getVendorByUser(user()->id),
            // 'user'  => $this->usersModel->getUserBy($id),
        ];
        // dd($data);
        return view('vendors/myvendor/profile', $data);
    } 
    public function service()
    {
        $data= [
            'title' => 'Service',
            'services' =>  $this->serviceModel->getServices(),
            'myservices' => $this->serviceModel->getServiceByUser(user()->id)
        ];
        // dd($data);
        return view('vendors/myvendor/service/index', $data);
    }
}
