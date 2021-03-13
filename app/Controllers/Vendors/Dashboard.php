<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('vendors/dashboard', $data);
    }
}
