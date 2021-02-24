<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\userModel;
class UserPermission extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User Permission | RH Wedding Planner',
        ];
        return view('admin/user/permission/index', $data);
    }

}
