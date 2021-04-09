<?php

namespace App\Controllers;

use App\Models\NotificationModel;

class Notification extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }


    public function getItemInUserNotification()
    {
        return $this->notificationModel->getWhere(['user_id' => user()->id])->getResultArray();
    }

    public function getJsonItemInUserNotification()
    {
        return json_encode($this->getItemInUserNotification(), JSON_PRETTY_PRINT);
    }

}
