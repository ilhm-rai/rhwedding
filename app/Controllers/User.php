<?php

namespace App\Controllers;

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

    public function profile($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUserBy($id),
        ];

        return view('user/profile/index', $data);
    }
    public function vendor($id)
    {
        $data = [
            'title'  => 'Profile | RH Wedding Planner',
            'user'  => $this->usersModel->getUserBy($id),
            'vendor'  => $this->vendorModel->getVendorByUser($id),
        ];
        // dd($data['vendor']);
        return view('user/profile/vendor', $data);
    }
}
