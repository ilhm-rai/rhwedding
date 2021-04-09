<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;

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

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->cartModel = new CartModel();
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

    public function accept()
    {
        $id = $this->request->getVar('dataId');

        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 1,
        ]);
        $detail = $this->transDetailModel->getWhere(['id' => $id])->getRowArray();
        return json_encode($detail);
    }

    public function reject()
    {
        $id = $this->request->getVar('dataId');

        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 0,
        ]);
        $detail = $this->transDetailModel->getWhere(['id' => $id])->getRowArray();
        return json_encode($detail);
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
    }
}
