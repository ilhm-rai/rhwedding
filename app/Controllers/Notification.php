<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\PaymentModel;

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

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->paymentModel = new PaymentModel();
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
        $notif = new \Midtrans\Notification();
        $payment = $this->paymentModel->getWhere(['order_id' => $notif['order_id']]);

        $this->paymentModel->save([
            'id' => $payment['id'],
            'order_id' => $notif['order_id'],
            'status_code' => $notif['status_code']
        ]);
        
    }

}
