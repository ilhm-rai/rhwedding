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
            'title'  => 'User Permissions | RH Wedding Planner',
            'roles'  => $this->userModel->getRoles()
        ];
        return view('admin/user/show_user_role', $data);
    }
    public function userPermission()
    {
       
        // dd($data);
        return view('admin/user/user_permission', $data);

    }
}
