<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;
use App\Models\VendorModel;
use App\Models\LevelModel;

class Main extends BaseController
{
    protected $serviceModel;
    protected $productModel;
    protected $productsImagesModel;
    protected $vendorModel;
    protected $levelModel;
    protected $cartModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
        $this->productsImagesModel = new ProductsImagesModel();
        $this->vendorModel = new VendorModel();
        $this->cartModel = new CartModel();
        $this->levelModel = new LevelModel();
        helper('text');
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


    public function productDetail($slug)
    {
        $product = $this->productModel->getProductBySlug($slug);
        if ($product) {
            if (logged_in()) {
                $userCart = $this->CartModel->getUserCart(user()->id);
            } else {
                $userCart = false;
            }

            $data = [
                'title' => 'RH Wedding Planner',
                'product' => $product,
                'productImg' => $this->productsImagesModel->getImagesByProduct($product['id']),
                'userCart' => $userCart
            ];
            $vendorId = $data['product']['vendor_id'];
            $data['vendor'] = $this->vendorModel->getVendorBy($vendorId);
            // dd($data);
            return view('main/product_detail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function cart()
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'itemsByVendor' => $this->CartModel->getItemGroupByVendor()
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

    public function mustlogin()
    {
        session()->setFlashdata('message', 'You must login first!');
        return redirect()->to('/login');
    }

    public function vendorRegister()
    {
        $data = [
            'title' => 'Vendor Register',
            'user_id' => user()->id,
            'validation' => \Config\Services::validation(),
        ];
        return view('main/vendor_register', $data);
    }

    public function addVendor()
    {
        if (!$this->validate([
            'vendor_name' => 'required|is_unique[vendors.vendor_name]',
            'contact_vendor' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postal_code' => 'required',

        ])) {
            return redirect()->to('/vendor/register')->withInput();
        }
        $user_id = $this->request->getVar('user_id');
        $vendorCode = $this->vendorModel->createVendorCode();
        $vendorName = $this->request->getVar('vendor_name');
        $slug = url_title($vendorName, '-') . '.V-' . random_string('numeric');
        $level = $this->levelModel->getWhere(['name' => 'Classic'])->getRowArray();
        $this->vendorModel->save([
            'user_id' => $user_id,
            'vendor_code' => $vendorCode,
            'vendor_name' => $vendorName,
            'slug' => $slug,
            'vendor_level_id' => $level['id'],
            'contact_vendor' => $this->request->getVar('contact_vendor'),
            'city' => $this->request->getVar('city'),
            'province' => $this->request->getVar('province'),
            'postal_code' => $this->request->getVar('postal_code'),
            'active' => 1,
        ]);
        $db = \Config\Database::connect();
        $tableGroup = $db->table('auth_groups');
        $role = $tableGroup->getWhere(['name' => 'Vendor'])->getRowArray();

        $tableGroupUser = $db->table('auth_groups_users');
        $tableGroupUser->set('group_id', $role['id']);
        $tableGroupUser->where('user_id', $user_id);
        $tableGroupUser->update();

        session()->setFlashdata('message', 'vendor has been successfully created');
        return redirect()->to('/vendors');
    }
}
