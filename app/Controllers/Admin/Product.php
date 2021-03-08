<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function index()
    {
        $data['title'] = 'Products - RH Wedding';
        return view('admin/product/index', $data);
    }

    public function catalog()
    {
        $data['title'] = 'Products Catalog - RH Wedding';
        return view('admin/product/catalog', $data);
    }

    public function add()
    {
        $data['title'] = 'Add New Product - RH Wedding';
        return view('admin/product/add', $data);
    }
}
