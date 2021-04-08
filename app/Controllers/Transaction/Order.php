<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransDetailModel;
use App\Models\NotificationModel;

class Order extends BaseController
{

    protected $transactionModel;
    protected $transDetailModel;
    protected $notificationModel;
    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->transDetailModel = new TransDetailModel();
        $this->notificationModel = new NotificationModel();
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
        $order = $this->transDetailModel->getWhere(['id' => $id])->getRowArray();
        $this->notificationModel->save([
            'user_id' => $userId,
            'message' => 'Pesanan dengan'. $order['id']. 'telah disetujui',
            'link' => ''
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
            'message' => 'Pesanan dengan'. $order['id']. 'ditolak',
            'link' => ''
        ]);
        session()->setFlashdata('message', 'Transaction has been successfully Rejected');
        return redirect()->to('/transaction/confirm/' . $code);
    }
}
