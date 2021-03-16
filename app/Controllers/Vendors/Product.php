<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function index()
    {
        $data['title'] = 'Products - RH Wedding';
        return view('vendors/product/index', $data);
    }
    public function edit()
    {
        $data['title'] = 'Edit Products - RH Wedding';
        return view('vendors/product/edit', $data);
    }

    // public function catalog()
    // {
    //     $data['title'] = 'Products Catalog - RH Wedding';
    //     return view('admin/product/catalog', $data);
    // }

    public function add()
    {
        $data['title'] = 'Add New Product - RH Wedding';
        return view('vendors/product/add', $data);
    }

    public function detail()
    {
        $data['title'] = '{Slug} - RH Wedding';
        return view('vendors/product/detail', $data);
    }
}
