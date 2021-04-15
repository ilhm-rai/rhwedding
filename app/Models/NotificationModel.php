<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notification';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id','message','link'];
    

}
