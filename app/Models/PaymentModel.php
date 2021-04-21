<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    protected $allowedFields = ['order_id','gross_amount','payment_type','transaction_time','bank','va_number','pdf_url','status_code'];
}