<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductCategory extends BaseController
{
    public function index()
    {
        $data['title'] = 'Product Categories - RH Wedding';
        return view('admin/product/category/index', $data);
    }
}
