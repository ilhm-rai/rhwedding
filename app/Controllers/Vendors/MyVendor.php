<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UsersModel;
use App\Models\VendorModel;
use App\Models\ServiceModel;
use App\Models\VendorsServicesModel;


class Myvendor extends BaseController

{

    protected $usersModel;
    protected $vendorModel;
    protected $serviceModel;
    protected $productModel;
    protected $vendorsServicesModel;


    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->productModel = new ProductModel();
        $this->vendorModel = new VendorModel();
        $this->serviceModel = new ServiceModel();
        $this->vendorsServicesModel = new VendorsServicesModel();
    }

    public function index()
    {
        $dataVendor = $this->vendorModel->getVendorByUser(user()->id);
        $data = [
            'title'  => 'My Vendor',
            'user'  => $this->usersModel->getUserBy(user()->id),
            'vendor'  => $dataVendor,
            'myServices' => $this->serviceModel->getServiceByVendorId($dataVendor['vendor_id'])
            // 'user'  => $this->usersModel->getUserBy($id),
        ];
        // dd($data);
        return view('vendors/myvendor/profile', $data);
    }

    public function edit()
    {
        $dataVendor = $this->vendorModel->getVendorByUser(user()->id);
        $data = [
            'title'  => 'My Vendor',
            'user'  => $this->usersModel->getUserBy(user()->id),
            'vendor'  => $dataVendor,
            'validation' => \Config\Services::validation(),  
        ];
        return view('vendors/myvendor/edit', $data);
    }




    public function service()
    {
        $data = [
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
            'vendor_id' => $this->request->getVar('vendorId'),
            'service_id' => $this->request->getVar('serviceId')
        ];
        $result = $this->vendorsServicesModel->getWhere($data)->getRowArray();
        if ($result) {
            if ($this->productModel->getWhere(['product_service_id' => $result['id']])->getRowArray()) {
                return session()->setFlashdata('message', 'Service yang digunakan product tidak dapat dihapus.');
            }

            $this->vendorsServicesModel->delete($result['id']);
            session()->setFlashdata('message', 'Service has been successfully deleted');
        } else {
            $this->vendorsServicesModel->save($data);
            session()->setFlashdata('message', 'Service has been successfully added');
        }
    }
}
