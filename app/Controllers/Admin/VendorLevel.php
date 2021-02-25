<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\levelModel;
use App\Models\vendorModel;

class VendorLevel extends BaseController
{

    protected $levelModel;
    protected $vendorModel;
   
    public function __construct()
    {
        $this->levelModel = new LevelModel();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Vendor level | RH Wedding Planner',
            'level'  => $this->levelModel->getLevel()
        ];
        return view('admin/vendors/level/index', $data);
    }

    public function add()
    {
        $data = [
            'title'  => 'Add Vendor Service | RH Wedding Planner',
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

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Service | RH Wedding Planner',
            'service'  => $this->serviceModel->getWhere(['id' => $id])->getRowArray(),
            'vendors'  => $this->vendorModel->getVendorsByService($id),
        ];
        // dd($data);
        return view('admin/vendors/service/detail', $data);
    }
}
