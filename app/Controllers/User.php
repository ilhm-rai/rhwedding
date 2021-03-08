<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function profile()
    {
        $data = [
            'title'  => 'User Profile | RH Wedding Planner',
        ];
        return view('user/profile', $data);
    }
}
