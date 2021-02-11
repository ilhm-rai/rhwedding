<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'Users';
        return view('admin/user/index', $data);
    }

    public function userPermission()
    {
        $data['title'] = 'User Permissions';
        return view('admin/user/user_permission', $data);
    }
}
