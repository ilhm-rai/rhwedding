<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\VendorModel;
use App\Models\ServiceModel;
use App\Models\VendorsServicesModel;


class Myvendor extends BaseController

{

    protected $usersModel;
    protected $vendorModel;  
    protected $serviceModel;
    protected $vendorsServicesModel;


    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->serviceModel = new ServiceModel();
        $this->vendorsServicesModel = new VendorsServicesModel();
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
            'myservices' => $this->serviceModel->getServiceByUser(user()->id),
            'vendor'  => $this->vendorModel->getVendorByUser(user()->id),
        ];
        // dd($data);
        return view('vendors/myvendor/service/index', $data);
    }


    public function addservice()
    {
		$data = [
			'vendor_id'=> $this->request->getVar('vendorId'),
			'service_id'=> $this->request->getVar('serviceId')
		];
        $result = $this->vendorsServicesModel->getWhere($data)->getRowArray();
        if ($result) {
            $this->vendorsServicesModel->delete($data);
            session()->setFlashdata('message', 'Service has been successfully deleted');
		}else{
            $this->vendorsServicesModel->save($data);
            session()->setFlashdata('message', 'Service has been successfully added');
        }
    }
}
