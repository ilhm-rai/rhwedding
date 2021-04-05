<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Order extends BaseController
{

    protected $transactionModel;
    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
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
}
