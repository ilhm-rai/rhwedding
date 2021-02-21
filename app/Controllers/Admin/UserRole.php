<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
class UserRole extends BaseController
{

    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function show()
    {
        $data = [
            'title'  => 'User Roles | RH Wedding Planner',
            'roles'  => $this->userModel->getRoles()
        ];
        return view('admin/user/show_user_role', $data);
    }
    

    public function add()
    {
        $data = [
            'title'  => 'Add User Roles | RH Wedding Planner',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/add_user_role', $data);   
    }

    public function save()
    {
        if (!$this->validate([
            'role' => 'required'
        ])) {
            return redirect()->to('/admin/users/roles/add')->withInput();
        }
        $this->userModel->saveRole([
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
        $this->userModel->deleteRole($id);
        session()->setFlashdata('message', 'Role has been successfully deleted');
        return redirect()->to('/admin/users/roles');
    }
}
