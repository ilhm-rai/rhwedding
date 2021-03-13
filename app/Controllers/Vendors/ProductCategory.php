<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;

class ProductCategory extends BaseController
{
    public function index()
    {
        $data['title'] = 'Product Categories';
        return view('vendors/product/category/index', $data);
    }
}
