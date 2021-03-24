<?php

namespace App\Controllers;
use App\Models\ServiceModel;
use App\Models\ProductModel;

class Main extends BaseController
{
    protected $serviceModel;
    protected $productModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'services' => $this->serviceModel->getServicesLimit(7),
            'servicesByProduct' => $this->serviceModel->getServicesByProduct(),
            'products' => $this->productModel->getProductsByService()
        ];
        // dd($data);

        return view('index', $data);
    }

    public function searchresult()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/search_result', $data);
    }

    public function productdetail()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

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

    public function vendor()
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
