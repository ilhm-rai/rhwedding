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
            'active' => 'vendor',
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
            'active' => 'vendor',
            'user'  => $this->usersModel->getUserBy(user()->id),
            'vendor'  => $dataVendor,
            'validation' => \Config\Services::validation(),  
        ];
        return view('vendors/myvendor/edit', $data);
    }

    public function update()
    {
        $vendorId = $this->request->getVar('vendor-id');
        $vendorName = $this->request->getVar('vendor-name');
        $oldVendorName = $this->request->getVar('old-vendor-name');
        $oldSlug = $this->request->getVar('old-slug');

        if($vendorName == $oldVendorName){
            $rulesVendorName = 'Required';
            $slug = $oldSlug;
        }else{
            $rulesVendorName ="required|is_unique[vendors.vendor_name]";
            $slug = url_title($vendorName, '-') . '.V-' . random_string('numeric');
        }

        if (!$this->validate([
            'vendor-name' => $rulesVendorName,
            'contact' => 'required',
            'city' => 'required',
            'vendor-address' => 'required',
            'vendor-banner' => [
                'rules'  => 'max_size[vendor-banner,5024]|ext_in[vendor-banner,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
            ]
        ])) {
            return redirect()->to('/vendors/myvendor/edit')->withInput();
        }
        $vendorBanner = $this->request->getFile('vendor-banner');
        if ($vendorBanner->getError() == 4) {
            $vendorBannerName = $this->request->getVar('old-vendor-banner');
        }else{
            // pindahkan file
            $vendorBanner->move('img/vendors/banners');
            $vendorBannerName = $vendorBanner->getName();
            // hapus file lama
            $oldVendorBanner = $this->request->getVar('old-vendor-banner');
            if($oldVendorBanner != '1.jpg'){
                unlink('img/vendors/banners/' . $oldVendorBanner);
            }
        }

        $this->vendorModel->save([
            'id' => $vendorId,
            'vendor_name' => $vendorName,
            'slug' => $slug,
            'contact_vendor' => $this->request->getVar('contact'),
            'city' => $this->request->getVar('city'),
            'vendor_address' => $this->request->getVar('vendor-address'),
            'vendor_banner' => $vendorBannerName
        ]);
        session()->setFlashdata('message', 'vendor has been successfully edited');
        return redirect()->to('/vendors/myvendor');
    }




    public function service()
    {
        $data = [
            'title' => 'Service',
            'active' => 'vendor',
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
