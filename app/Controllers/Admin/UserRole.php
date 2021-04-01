<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UsersModel;
class UserRole extends BaseController
{

    protected $roleModel;
    protected $usersModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User Roles | RH Wedding Planner',
            'active' => 'users',
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
        $this->roleModel->save([
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
        $this->roleModel->delete($id);
        session()->setFlashdata('message', 'Role has been successfully deleted');
        return redirect()->to('/admin/users/roles');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Roles | RH Wedding Planner',
            'validation' => \Config\Services::validation(),
            'role'  => $this->roleModel->getWhere(['id' => $id])->getRowArray(),
        ];
        return view('admin/user/role/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'role' => 'required',
        ])) {
            return redirect()->to('/admin/users/roles/edit/' . $id)->withInput();
        }
        $this->roleModel->save([
            'id'    => $id,
            'name' => $this->request->getVar('role'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('message', 'Role has been successfully edited');
        return redirect()->to('/admin/users/roles/detail/' . $id);
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Detail Roles | RH Wedding Planner',
            'role'  => $this->roleModel->getWhere(['id' => $id])->getRowArray(),
            'users'  => $this->usersModel->getUsersByRole($id),
        ];
        // dd($data);
        return view('admin/user/role/detail', $data);
    }

}
