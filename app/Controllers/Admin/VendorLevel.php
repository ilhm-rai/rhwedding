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
            'title'  => 'Add Vendor Level | RH Wedding Planner',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/vendors/level/add', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'name' => 'required'
        ])) {
            return redirect()->to('/admin/vendors/level/add')->withInput();
        }
        $this->levelModel->save([
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'active' => 1
        ]);
        session()->setFlashdata('message', 'Level been successfully added');
        return redirect()->to('/admin/vendors/level');
    }

    public function delete($id)
    {
        // cari role berdasarkan id
        $this->levelModel->delete($id);
        session()->setFlashdata('message', 'Level has been successfully deleted');
        return redirect()->to('/admin/vendors/level');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Level | RH Wedding Planner',
            'validation' => \Config\Services::validation(),
            'level'  => $this->levelModel->getWhere(['id' => $id])->getRowArray(),
        ];
        return view('admin/vendors/level/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required',
        ])) {
            return redirect()->to('/admin/vendors/level/edit/' . $id)->withInput();
        }
        $this->levelModel->save([
            'id'    => $id,
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('message', 'Level has been successfully edited');
        return redirect()->to('/admin/vendors/level/detail/' . $id);
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Level | RH Wedding Planner',
            'level'  => $this->levelModel->getWhere(['id' => $id])->getRowArray(),
            'vendors'  => $this->vendorModel->getVendorsByLevel($id),
        ];
        // dd($data);
        return view('admin/vendors/level/detail', $data);
    }
}
