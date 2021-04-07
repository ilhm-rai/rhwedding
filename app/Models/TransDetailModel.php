<?php

namespace App\Models;

use CodeIgniter\Model;

class TransDetailModel extends Model
{
    protected $table = 'transaction_detail';
    protected $allowedFields = ['transaction_id','product_id','note','sub_total_payment','confirm','reason_reject'];
}
