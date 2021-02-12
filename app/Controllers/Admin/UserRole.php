<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserRole extends BaseController
{
    public function show()
    {
        $data['title'] = 'User Roles - RH Wedding';
        return view('admin/user/show_user_role', $data);
    }
}
