<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;

class Order extends BaseController
{

    protected $transactionModel;
    protected $transDetailModel;
    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
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
}
