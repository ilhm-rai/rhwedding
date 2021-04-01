<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data =[
            'title' => 'dashboard',
            'active' => 'dashboard vendor',
        ];
        return view('vendors/dashboard', $data);
    }
}
