<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ServiceModel;
use App\Models\ProductModel;
use App\Models\ProductsImagesModel;
use App\Models\VendorModel;
use App\Models\LevelModel;
use App\Models\UsersModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\PaymentModel;

class Main extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $serviceModel;
    protected $productModel;
    protected $productsImagesModel;
    protected $vendorModel;
    protected $levelModel;
    protected $cartModel;
    protected $userModel;
    protected $transactionModel;
    protected $transDetailModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->productModel = new ProductModel();
        $this->productsImagesModel = new ProductsImagesModel();
        $this->vendorModel = new VendorModel();
        $this->cartModel = new CartModel();
        $this->levelModel = new LevelModel();
        $this->userModel = new UsersModel();
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->paymentModel = new PaymentModel();

        helper('text');
    }

    public function index()
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'servicesByProduct' => $this->serviceModel->getServicesByProduct(),
            'products' => $this->productModel->getAllProducts()
        ];
        // dd($data);
        return view('index', $data);
    }


    public function productDetail($slug)
    {
        $product = $this->productModel->getProductBySlug($slug);
        if ($product) {
            if (logged_in()) {
                $userCart = $this->cartModel->getUserCart();
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
            'itemsByVendor' => $this->cartModel->getItemGroupByVendor()
        ];

        return view('main/cart', $data);
    }

    public function checkout()
    {
        $data = [
            'title' => 'RH Wedding Planner',
            'user' => $this->userModel->getUserBy(user_id()),
            'items' => $this->cartModel->getItemInUserCart(['process_into_transaction' => 1])
        ];

        return view('main/checkout', $data);
    }

    public function vendor($slug)
    {
        $data = [
            'vendor' => $this->vendorModel->getVendorBySlug($slug),
        ];
        $data['title'] = $data['vendor']['vendor_name'];
        $data['products'] = $this->productModel->getProductsByVendorId($data['vendor']['id']);
        // dd($data);
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
            'city' => 'required',
            'address' => 'required',

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
            'address' => $this->request->getVar('address'),
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

    public function order()
    {
        $data = [
            'title' => 'My Order',
            'user' => $this->userModel->getUserBy(user()->id),
            'transactions' => $this->transactionModel->getTransByBuyerId(user()->id)
        ];
        // dd($data);
        return view('main/transaction/index', $data);
    }

    public function orderHistory()
    {
        $data = [
            'title' => 'Order History',
            'user' => $this->userModel->getUserBy(user()->id),
            'transactions' => $this->transactionModel->getHistoryTransByBuyerId(user()->id)
        ];
        // dd($data);
        return view('main/transaction/history', $data);
    }


    public function detailOrder($code)
    {

        $data = [
            'title'  => 'Detail Order',
            'trans' => $this->transactionModel->getTransBy($code),
            'detail' => $this->transDetailModel->getDetailByTransCode($code),
        ];
        return view('main/transaction/detail', $data);
    }

    public function orderProcess($code)
    {
        $data = [
            'title'  => 'Order Process',
            'trans' => $this->transactionModel->getTransBy($code),
            'detail' => $this->transDetailModel->getDetailByTransCode($code),
        ];
        // dd($data);

        $user = $this->userModel->getUserBy(user()->id);

        //Set Your server key
        \Midtrans\Config::$serverKey = "SB-Mid-server-0CdKKn0ekLgYSuUWp2V7huR5";

        // Uncomment for production environment
        \Midtrans\Config::$isProduction = false;

        // Enable sanitization
        \Midtrans\Config::$isSanitized = true;

        // Enable 3D-Secure
        \Midtrans\Config::$is3ds = true;

        // Uncomment for append and override notification URL
        // Config::$appendNotifUrl = "https://example.com";
        // Config::$overrideNotifUrl = "https://example.com";

        // Required
        $transaction_details = array(
            'order_id' => $data['trans']['transaction_code'],
            'gross_amount' => $data['trans']['cash_in'], // no decimal allowed for creditcard
        );

        // Optional
        $item_details = array();

        foreach ($data['detail'] as $item) {
            if ($item['confirm'] == 1) {
                $item = [
                    'id' => $item['id'],
                    'price' => $item['price'],
                    'quantity' => 1,
                    'name' => $item['product_name'],
                ];
                array_push($item_details, $item);
            }
        }

        //   Optional
        $shipping_address = array(
            'address'       => $data['trans']['event_address'],
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => $user['full_name'],
            'email'         => $user['email'],
            'phone'         => $user['contact'],
            'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments =  [
            "credit_card",
            "gopay",
            "shopeepay",
            "permata_va",
            "bca_va",
            "bni_va",
            "bri_va",
            "echannel",
            "other_va",
            "danamon_online",
            "mandiri_clickpay",
            "cimb_clicks",
            "bca_klikbca",
            "bca_klikpay",
            "bri_epay",
            "xl_tunai",
            "indosat_dompetku",
            "kioson",
            "Indomaret",
            "alfamart",
            "akulaku"
        ];
        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        $data['snapToken'] = $snapToken;
        return view('main/transaction/process', $data);
    }

    public function productByService($service_name)
    {
        $data = [
            'title' => 'Products by Service',
            'products' => $this->productModel->getProductsByService(urldecode($service_name)),
            'service_name' => urldecode($service_name)
        ];

        return view('main/product_by_service', $data);
    }


    public function orderFinish()
    {
        $result = json_decode($this->request->getPost('result_data'), true);
        $data = [
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_number' => $result['va_numbers'][0]['va_number'],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code'],
        ];
        $simpan = $this->paymentModel->save($data);
        if ($simpan) {
            echo 'Sukses';
        } else {
            echo "Gagal";
        }
    }
}
