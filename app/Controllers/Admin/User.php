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

    public function group()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('auth_groups');
        $query   = $builder->get();
        $data = [
            'title'  => 'User Group | RH Wedding Planner',
            'groups'  => $query->getResultArray()
        ];
        // dd($data);
        return view('admin/user/group', $data);
    }
}
