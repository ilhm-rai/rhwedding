<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;

class Product extends BaseController
{
    protected $serviceModel;
    protected $productModel;
    protected $productsImagesModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
        $this->productsImagesModel = new ProductsImagesModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'All Products',
            'active' => 'products',
            'products'  => $this->productModel->getAllProducts(),
            'services' => $this->serviceModel->getServices(),
        ];
        return view('admin/product/index', $data);
    }

    public function detail($slug)
    {
        $product = $this->productModel->getProductBySlug($slug);
        $data = [
            'title'  => 'Detail Product',
            'active' => 'products',
            'product'  => $product,
            'productImg' => $this->productsImagesModel->getWhere(['product_id' => $product['id']])->getResultArray(),
        ];
        // dd($data);
        return view('Admin/product/detail', $data);
    }

    
    public function delete($id)
    {
        $product =  $this->productModel->getProductById($id);
        $productImages =  $this->productsImagesModel->getWhere(['product_id' => $id])->getResultArray();
        unlink('img/products/main-img/' . $product['product_main_image']);
        foreach ($productImages as $img) {
            unlink('img/products/other/' . $img['image']);
        }
        $this->productModel->delete($id);

         session()->setFlashdata('message', 'Product has been successfully deleted');
         return redirect()->to('/admin/products');
    }
}
