<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Vendor extends BaseController
{
    public function index()
    {
        $data['title'] = 'Vendors';
        return view('admin/vendor/index', $data);
    }
}
