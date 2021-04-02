<?php

namespace App\Controllers\Vendors;

use App\Controllers\BaseController;
use App\Models\VendorModel;
use App\Models\UsersModel;
use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;

class Product extends BaseController
{

    protected $usersModel;
    protected $vendorModel;  
    protected $serviceModel;
    protected $productModel;
    protected $productsImagesModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->vendorModel = new VendorModel();
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
        $this->productsImagesModel = new ProductsImagesModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'title'  => 'Products - RH Wedding',
            'active' => 'product',
            'products'  => $this->productModel->getProductsByUser(user()->id),
            'services' => $this->serviceModel->getServices(),
        ];
        // dd($data);
        return view('vendors/product/index', $data);
    }

    public function add()
    {
        $data = [
            'title' =>'Add New Product - RH Wedding',
            'active' => 'product',
            'services' => $this->serviceModel->getServiceByUser(user()->id),
            'vendor'  => $this->vendorModel->getVendorByUser(user()->id),
            'validation' => \Config\Services::validation(),  
        ];
        return view('vendors/product/add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'product-name' => 'required|is_unique[products.product_name]',
            'service' => 'required',
            'product-description' => 'required',
            'price' => 'required',
            'main-img' => [
                'rules'  => 'uploaded[main-img]|max_size[main-img,5024]|ext_in[main-img,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ],
            'image1' => [
                'rules'  => 'max_size[image1,5024]|ext_in[image1,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ],
            'image2' => [
                'rules'  => 'max_size[image2,5024]|ext_in[image2,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ],
            'image3' => [
                'rules'  => 'max_size[image3,5024]|ext_in[image3,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ],
            'image4' => [
                'rules'  => 'max_size[image4,5024]|ext_in[image4,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ],
            
        ])) {
            return redirect()->to('/vendors/products/add')->withInput();
        }
        // lolos validasi
        // Upload cover
          $mainImg = $this->request->getFile('main-img');
          $image1 = $this->request->getFile('image1');
          $image2 = $this->request->getFile('image2');
          $image3 = $this->request->getFile('image3');
          $image4 = $this->request->getFile('image4');
          // pindahkan file 
          $mainImg->move('img/products/main-img');
          $mainImgName = $mainImg->getName();
          $productCode =$this->productModel->createProductCode($this->request->getVar('vendor-id'));
          $productName = $this->request->getVar('product-name');
          $slug = url_title($productName, '-') . '.P-' . random_string('numeric');
          $this->productModel->save([
              'product_code' => $productCode,
              'vendor_id' => $this->request->getVar('vendor-id'),
              'product_name' => $productName,
              'slug' => $slug,
              'product_service_id' => $this->request->getvar('service'),
              'product_main_image' => $mainImgName,
              'product_description' => $this->request->getvar('product-description'),
              'price' => $this->request->getvar('price'),
          ]);

        //   save product images
        $product = $this->productModel->getProductBySlug($slug);
        if (!$image1->getError() == 4) {
            // pindahkan file 
            $image1->move('img/products/other');
            $image1Name = $image1->getName();
            $this->productsImagesModel->save([
                'product_id' => $product['id'],
                'image' => $image1Name
            ]);
        } 
        if (!$image2->getError() == 4) {
            // pindahkan file 
            $image2->move('img/products/other');
            $image2Name = $image2->getName();
            $this->productsImagesModel->save([
                'product_id' => $product['id'],
                'image' => $image2Name
            ]);
        } 
        if (!$image3->getError() == 4) {
            // pindahkan file 
            $image3->move('img/products/other');
            $image3Name = $image3->getName();
            $this->productsImagesModel->save([
                'product_id' => $product['id'],
                'image' => $image3Name
            ]);
        } 
        if (!$image4->getError() == 4) {
            // pindahkan file 
            $image4->move('img/products/other');
            $image4Name = $image4->getName();
            $this->productsImagesModel->save([
                'product_id' => $product['id'],
                'image' => $image4Name
            ]);
        }
        
        
        session()->setFlashdata('message', 'Product has been successfully added');
        return redirect()->to('/vendors/products'); 
    }


    public function detail($slug)
    {
        $product = $this->productModel->getProductBySlug($slug);
        $data = [
            'title'  => 'Products - RH Wedding',
            'active' => 'product',
            'product'  => $product,
            'productImg' => $this->productsImagesModel->getWhere(['product_id' => $product['id']])->getResultArray(),
        ];
        // dd($data);
        return view('vendors/product/detail', $data);
    }

    public function edit($slug)
    {
        $product = $this->productModel->getProductBySlug($slug);

        $data = [
            'title'  => 'Edit Products - RH Wedding',
            'active' => 'product',
            'product'  => $product,
            'services' => $this->serviceModel->getServiceByUser(user()->id),
            'productImg' => $this->productsImagesModel->getWhere(['product_id' => $product['id']])->getResultArray(),
            'validation' => \Config\Services::validation(),  
        ];
        // dd($data);
        return view('vendors/product/edit', $data);
    }

    public function update($slug)
    {
        $product = $this->productModel->getProductBy($this->request->getVar('product-id'));
        $productName = $this->request->getVar('product-name');
        if($product['product_name'] == $productName){
            $rulesProductName = 'required';
        }else{
            $rulesProductName = 'required|is_unique[products.product_name]';
        }

        if (!$this->validate([
            'product-name' => $rulesProductName,
            'service' => 'required',
            'product-description' => 'required',
            'price' => 'required',
            'main-img' => [
                'rules'  => 'max_size[main-img,5024]|ext_in[main-img,png,jpg,jpeg,svg,gif]',
                'errors' => [
                    'ext_in' => "Extension must Image",

                ]
                ]
        ])) {
            return redirect()->to('/vendors/products/edit/'. $slug)->withInput();
        }
        // lolos validasi
        // Upload cover
          $mainImg = $this->request->getFile('main-img');
          $image1 = $this->request->getFile('image1');
          $image2 = $this->request->getFile('image2');
          $image3 = $this->request->getFile('image3');
          $image4 = $this->request->getFile('image4');
          

        if ($mainImg->getError() == 4) {
            $mainImgName = $this->request->getVar('old-main-image');
        } else {   
            // pindahkan file 
            $mainImg->move('img/products/main-img');
            $mainImgName = $mainImg->getName();
            // hapus file lama
            $oldMainImg = $this->request->getVar('old-main-image');
            unlink('img/products/main-img/' . $oldMainImg);

        }

        
        $oldProduct = $this->productModel->getProductBySlug($this->request->getVar('old-slug'));
        if($productName != $oldProduct['product_name']){
            $slug = url_title($productName, '-') . '.P-' . random_string('numeric');
        }else{
            $slug = $this->request->getVar('old-slug');
        }
          $this->productModel->save([
              'id' => $this->request->getVar('product-id'),
              'product_name' => $productName,
              'slug' => $slug,
              'product_service_id' => $this->request->getvar('service'),
              'product_main_image' => $mainImgName,
              'product_description' => $this->request->getvar('product-description'),
              'price' => $this->request->getvar('price'),
          ]);   

          $oldIdImg1 = $this->request->getVar('old-image1-id');
          $oldIdImg2 = $this->request->getVar('old-image2-id');
          $oldIdImg3 = $this->request->getVar('old-image3-id');
          $oldIdImg4 = $this->request->getVar('old-image4-id');

        $product = $this->productModel->getProductBySlug($slug);
        if (!$image1->getError() == 4) {   
            $image1->move('img/products/other');
            $image1Name = $image1->getName();
            if($oldIdImg1 == ''){
                $this->productsImagesModel->save([
                    'product_id' => $product['id'],
                    'image' => $image1Name
                ]);
            }else{
                $this->productsImagesModel->save([
                    'id' => $oldIdImg1,
                    'image' => $image1Name
                ]);
                $oldImg1 = $this->request->getVar('old-image1'); 
                unlink('img/products/other/' . $oldImg1);
            }
        }
        if (!$image2->getError() == 4) {   
            $image2->move('img/products/other');
            $image2Name = $image2->getName();
            if($oldIdImg2 == ''){
                $this->productsImagesModel->save([
                    'product_id' => $product['id'],
                    'image' => $image2Name
                ]);
            }else{
                $this->productsImagesModel->save([
                    'id' => $oldIdImg2,
                    'image' => $image2Name
                ]);
                $oldImg2 = $this->request->getVar('old-image2'); 
                unlink('img/products/other/' . $oldImg2);
            }
        }
        if (!$image3->getError() == 4) {   
            $image3->move('img/products/other');
            $image3Name = $image3->getName();
            if($oldIdImg3 == ''){
                $this->productsImagesModel->save([
                    'product_id' => $product['id'],
                    'image' => $image3Name
                ]);
            }else{
                $this->productsImagesModel->save([
                    'id' => $oldIdImg3,
                    'image' => $image3Name
                ]);
                $oldImg3 = $this->request->getVar('old-image3'); 
                unlink('img/products/other/' . $oldImg3);
            }
        }
        if (!$image4->getError() == 4) {   
            $image4->move('img/products/other');
            $image4Name = $image4->getName();
            if($oldIdImg4 == ''){
                $this->productsImagesModel->save([
                    'product_id' => $product['id'],
                    'image' => $image4Name
                ]);
            }else{
                $this->productsImagesModel->save([
                    'id' => $oldIdImg4,
                    'image' => $image4Name
                ]);
                $oldImg4 = $this->request->getVar('old-image4'); 
                unlink('img/products/other/' . $oldImg4);
            }
        }
        session()->setFlashdata('message', 'Product has been successfully edited');
        return redirect()->to('/vendors/products/detail/'. $slug); 
    }

    public function delete($id)
    {
        $product =  $this->productModel->getProductBy($id);
        $productImages =  $this->productsImagesModel->getWhere(['product_id' => $id])->getResultArray();
        unlink('img/products/main-img/' . $product['product_main_image']);
        foreach ($productImages as $img) {
            unlink('img/products/other/' . $img['image']);
        }
        $this->productModel->delete($id);

         session()->setFlashdata('message', 'Product has been successfully deleted');
         return redirect()->to('/vendors/products');
    }
}
