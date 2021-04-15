<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\NotificationModel;
use App\Models\ProductModel;

class Order extends BaseController
{

    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $transactionModel;
    protected $transDetailModel;
    protected $cartModel;
    protected $notificationModel;
    protected $productModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->cartModel = new CartModel();
        $this->notificationModel = new NotificationModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Order & Shop',
            'active' => 'order',
            'trans' => $this->transactionModel->getTransByUser(user()->id),
        ];
        // dd($data);
        return view('transaction/order/index', $data);
    }

    public function confirm($code)
    {
        $data = [
            'title'  => 'Detail Order',
            'active' => 'order',
            'trans' => $this->transactionModel->getTransBy($code),
            'detail' => $this->transactionModel->getTransDetailBy(user()->id, $code),
        ];
        // dd($data);
        return view('transaction/order/confirm', $data);
    }

    public function accept($id)
    {
        $code = $this->request->getVar('code');
        $userId = $this->request->getVar('user-id');
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 1,
            'reason_reject' => null
        ]);
        $order = $this->transDetailModel->getDetailTransBy($id);
        // kirim notifikasi kepada pembeli
        $this->notificationModel->save([
            'user_id' => $userId,
            'message' => 'Order for ' . $order['product_name'] . ' has been approved',
            'link' => '/transaction/'. $code
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Accepted');
        return redirect()->to('/transaction/confirm/' . $code);
    }

    public function reject()
    {
        $id = $this->request->getVar('detail-id');
        $code = $this->request->getVar('code');
        $reason = $this->request->getVar('reason');
        $userId = $this->request->getVar('user-id');
        // dd($reason,$id,$code,$userId);
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 0,
            'reason_reject' => $reason
        ]);
        $order = $this->transDetailModel->getWhere(['id' => $id])->getRowArray();

        $this->notificationModel->save([
            'user_id' => $userId,
            'message' => 'Pesanan dengan' . $order['id'] . 'ditolak',
            'link' => ''
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Rejected');
        return redirect()->to('/transaction/confirm/' . $code);
    }

    public function insertTransaction()
    {
        date_default_timezone_set("Asia/Bangkok");
        $transaction_date = date('Y-d-m H:i:s');
        $transaction_expired = date('Y-d-m H:i:s', strtotime($transaction_date) + (7 * 24 * 60 * 60));
        $invoice = $this->cartModel->getInvoice();
        $items = $this->cartModel->getItemInUserCart(['process_into_transaction' => 1]);
        $event_date = date('Y-m-d', strtotime($this->request->getVar('event_date')));
        $event_time = date('H:i:s', strtotime($this->request->getVar('event_time')));
        $event_address = $this->request->getVar('event_address');
        $transaction_code = strtoupper(uniqid('TRA-'));

        $data = [
            'transaction_code' => $transaction_code,
            'user_id' => user()->id,
            'transaction_date' => $transaction_date,
            'transaction_exp_date' => $transaction_expired,
            'total_pay' => $invoice,
            'event_date' => $event_date,
            'event_time' => $event_time,
            'event_address' => $event_address
        ];

        $this->transactionModel->insertTransaction($data);

        $transaction_id = $this->transactionModel->getIdTransactionByCode($transaction_code);

        foreach ($items as $item) {
            $transaction_detail[] = [
                'transaction_id' => $transaction_id,
                'product_id' => $item['product_id']
            ];  
            
            
        }

        $isInsertItemSuccess = $this->transactionModel->insertTransactionDetail($transaction_detail);

        if ($isInsertItemSuccess != false) {
            $this->cartModel->deleteItemAfterTransaction();
        }

         // kirim notifikasi pesanan barang kepada owner vendor
         foreach ($items as $item ) {
            $product = $this->productModel->getProductBy($item['product_id']);
            $message = 'New orders for ' .$item['product_name'] .' require confirmation';
            $this->notificationModel->save([
                'user_id' => $product['owner'],
                'message' =>  $message,
                'link' => '/transaction/confirm/'. $transaction_code
            ]);
         }
        //  kirim notifikasi ke pada pembeli
        $message_buyer = 'Order with code ' . $transaction_code . ' is being processed';
        $this->notificationModel->save([
            'user_id' => user()->id,
            'message' => $message_buyer,
            'link' => '/transaction/'. $transaction_code
        ]);
        
    }
}
