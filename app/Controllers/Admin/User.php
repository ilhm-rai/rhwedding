<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class User extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User List | RH Wedding Planner',
            'users'  => $this->usersModel->getUser(),
        ];
        return view('admin/user/index', $data);
    }


    public function detail($id)
    {
        $data = [
            'title'  => 'Detail User | RH Wedding Planner',
            'user'  => $this->usersModel->getUser($id),
        ];
        return view('admin/user/detail', $data);
    }
    
}
