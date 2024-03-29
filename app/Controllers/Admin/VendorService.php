<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\VendorModel;

class VendorService extends BaseController
{

    protected $serviceModel;
    protected $vendorModel;
   
    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Vendor Services | RH Wedding Planner',
            'active' => 'vendors',
            'services'  => $this->serviceModel->getServices()
        ];
        return view('admin/vendors/service/index', $data);
    }
    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Service | RH Wedding Planner',
            'active' => 'vendors',
            'service'  => $this->serviceModel->getWhere(['id' => $id])->getRowArray(),
            'vendors'  => $this->vendorModel->getVendorsByService($id),
        ];
        // dd($data);
        return view('admin/vendors/service/detail', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Add Vendor Service | RH Wedding Planner',
            'active' => 'vendors',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/vendors/service/add', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required'
        ])) {
            return redirect()->to('/admin/vendors/services/add')->withInput();
        }
        $this->serviceModel->save([
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'active' => 1
        ]);
        session()->setFlashdata('message', 'Service been successfully added');
        return redirect()->to('/admin/vendors/services');
    }

    public function delete($id)
    {
        // cari role berdasarkan id
        $this->serviceModel->delete($id);
        session()->setFlashdata('message', 'Service has been successfully deleted');
        return redirect()->to('/admin/vendors/services');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Services | RH Wedding Planner',
            'active' => 'vendors',
            'validation' => \Config\Services::validation(),
            'service'  => $this->serviceModel->getWhere(['id' => $id])->getRowArray(),
        ];
        return view('admin/vendors/service/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/vendors/services/edit/' . $id)->withInput();
        }
        $this->serviceModel->save([
            'id'    => $id,
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('message', 'Service has been successfully edited');
        return redirect()->to('/admin/vendors/services/detail/' . $id);
    }

   
}
