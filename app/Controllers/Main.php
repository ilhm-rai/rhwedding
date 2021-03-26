<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;
use App\Models\VendorModel;

class Main extends BaseController
{
    protected $serviceModel;
    protected $productModel;
    protected $productsImagesModel;
    protected $vendorModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
        $this->productsImagesModel = new ProductsImagesModel();
        $this->vendorModel = new VendorModel();
    }
    public function index()
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'services' => $this->serviceModel->getServices(),
            'servicesByProduct' => $this->serviceModel->getServicesByProduct(),
            'products' => $this->productModel->getProductsByService()
        ];
        // dd($data);

        return view('index', $data);
    }

    
    public function productdetail($code)
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'product' => $this->productModel->getProductByCode($code),
            'productImg' => $this->productsImagesModel->getImagesByProductCode($code)
        ];
        $vendorId = $data['product']['vendor_id'];
        $data['vendor'] = $this->vendorModel->getVendorBy($vendorId);
        // dd($data);
        return view('main/product_detail', $data);
    }

    public function cart()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/cart', $data);
    }

    public function checkout()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/checkout', $data);
    }

    public function vendor($id)
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/vendor', $data);
    }

    public function vendorProduct()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/vendor_product', $data);
    }
}
