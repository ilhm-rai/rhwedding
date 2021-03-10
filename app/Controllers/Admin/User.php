<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\VendorModel;

class User extends BaseController
{
    protected $usersModel;
    protected $vendorModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'User List | RH Wedding Planner',
            'users'  => $this->usersModel->getUser(),
        ];
        return view('admin/user/index', $data);
    }

    public function profile($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUser($id),
        ];
        // dd($data['user']);
        return view('admin/user/profile/profile', $data);
    }
    public function vendor($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUser($id),
            'vendor'  => $this->vendorModel->getVendorByUser($id),
        ];
        // dd($data['vendor']);
        return view('admin/user/profile/vendor', $data);
    }
}
