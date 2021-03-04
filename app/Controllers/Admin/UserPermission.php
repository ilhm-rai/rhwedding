<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
class UserPermission extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User Permission | RH Wedding Planner',
        ];
        return view('admin/user/permission/index', $data);
    }

}
