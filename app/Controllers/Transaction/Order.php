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

    public function accept($id)
    {        
        $code = $this->request->getVar('code');
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 1,
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Accepted');
        return redirect()->to('/transaction/confirm/' . $code);

    }

    public function reject($id)
    {        
        $code = $this->request->getVar('code');
        $this->transDetailModel->save([
            'id' => $id,
            'confirm' => 0,
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Rejected');
        return redirect()->to('/transaction/confirm/' . $code);
    }
}
