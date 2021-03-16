<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\VendorModel;
use App\Models\UsersModel;
use App\Models\ServiceModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class Product extends BaseController
{

    protected $usersModel;
    protected $vendorModel;  
    protected $serviceModel;
    protected $categoryModel;
    protected $productModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->serviceModel = new ServiceModel();
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Products - RH Wedding',
            'products'  => $this->productModel->getProductsByUser(user()->id),
            'services' => $this->serviceModel->getServices(),
            'categories' => $this->categoryModel->getCategories(),
        ];
        // dd($data);
        return view('vendors/product/index', $data);
    }
    public function edit()
    {
        $data['title'] = 'Edit Products - RH Wedding';
        return view('vendors/product/edit', $data);
    }

    public function add()
    {
        $data['title'] = 'Add New Product - RH Wedding';
        return view('vendors/product/add', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'  => 'Products - RH Wedding',
            'product'  => $this->productModel->getProductBy($id),
        ];
        // dd($data);
        return view('vendors/product/detail', $data);
    }
}
