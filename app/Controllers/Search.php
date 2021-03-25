<?php

namespace App\Controllers;
use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;
use App\Models\VendorModel;

class Search extends BaseController
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
        $keyword = $this->request->getVar('keyword');
        $data = [
            'vendors' => $this->vendorModel->getVendorsSuggest($keyword),
            'products' => $this->productModel->getProductsSuggest($keyword),
        ];

        echo json_encode($data);
    }
}
