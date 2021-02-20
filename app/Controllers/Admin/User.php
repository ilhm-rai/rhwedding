<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User List | RH Wedding Planner',
            'users'  => $this->userModel->getUser(),
        ];
        return view('admin/user/index', $data);
    }


    public function detail($username)
    {
        $data = [
            'title'  => 'Detail User | RH Wedding Planner',
            'user'  => $this->userModel->getUser('username', $username),
        ];
        return view('admin/user/detail', $data);
    }
    
}
