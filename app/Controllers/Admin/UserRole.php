<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\roleModel;
class UserRole extends BaseController
{

    protected $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User Roles | RH Wedding Planner',
            'roles'  => $this->roleModel->getRoles()
        ];
        return view('admin/user/role/index', $data);
    }
    

    public function add()
    {
        $data = [
            'title'  => 'Add User Roles | RH Wedding Planner',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/role/add', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'role' => 'required'
        ])) {
            return redirect()->to('/admin/users/roles/add')->withInput();
        }
        $this->roleModel->saveRole([
            'name' => $this->request->getVar('role'),
            'description' => $this->request->getVar('description'),
            'active' => 1
        ]);
        session()->setFlashdata('message', 'Role has been successfully added');
        return redirect()->to('/admin/users/roles');
    }
    
    public function delete($id)
    {
        // cari role berdasarkan id
        $this->roleModel->deleteRole($id);
        session()->setFlashdata('message', 'Role has been successfully deleted');
        return redirect()->to('/admin/users/roles');
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Roles | RH Wedding Planner',
            'role'  => $this->roleModel->getRoles('id', $id),
        ];
        return view('admin/user/detail_user_role', $data);
    }
}
