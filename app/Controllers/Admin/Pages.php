<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return view('admin/page/dashboard', $data);
    }

    public function users()
    {
        $data['title'] = 'Users';
        return view('admin/page/user', $data);
    }
}
