<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
class Notification extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $notificationModel;
    protected $paymentModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->paymentModel = new PaymentModel();
        $this->transactionModel = new TransactionModel();
        helper('date');
    }



    public function index()
    {
        $data = [
            'menuActive' => false,
            'title' => 'My Notification',
            'notification' => $this->notificationModel->getWhere(['user_id' =>user()->id])->getResultArray(),       
         ];
        //   dd($data);
         return view('main/notification', $data);
    }
    public function delete($id)
    {
        $this->notificationModel->delete($id);
        session()->setFlashdata('message', 'Notification has been successfully deleted');
        return redirect()->to('/notification');

    }
    public function getItemInUserNotification()
    {
        return $this->notificationModel->getWhere(['user_id' => user()->id])->getResultArray();
    }

    public function getJsonItemInUserNotification()
    {
        return json_encode($this->getItemInUserNotification(), JSON_PRETTY_PRINT);
    }


    public function handling()
    {
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = "SB-Mid-server-0CdKKn0ekLgYSuUWp2V7huR5";
        $notif = new \Midtrans\Notification();
        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;
        $payment = $this->paymentModel->getWhere(['order_id' => $order_id])->getRowArray();
        $transaction = $this->transactionModel->getWhere(['transaction_code' => $order_id])->getRowArray();
         
        $this->paymentModel->save([
            'id' => $payment['id'],
            'order_id' => $order_id,
            'status_code' => $notif->status_code
        ]);
        
        if($notif->status_code == 200){
             $this->transactionModel->save([
            'id' => $transaction['id'],
            'payment_date' => date("Y-m-d", now('Asia/Bangkok')),
            'payment_status' => 1
            ]);

            session()->setFlashdata('message', 'Thank you for your payment');
            return redirect()->to('/transaction/history');
        }
      
        
    }

}
