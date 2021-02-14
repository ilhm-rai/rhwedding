<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductCategory extends BaseController
{
    public function show()
    {
        $data['title'] = 'Product Categories - RH Wedding';
        return view('admin/product/product_category', $data);
    }
}
