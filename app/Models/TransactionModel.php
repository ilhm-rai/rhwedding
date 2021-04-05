<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $allowedFields = ['transaction_code', 'user_id ', 'total_pay','transaction_date','transaction_exp_date','payment_method','payment_date','payment_status','event_date'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getTransByUser($id)
    {
        $query = "SELECT `t`.*, COUNT(`td`.`id`) AS amount, SUM(`td`.`sub_total_payment`) AS `payment`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        WHERE `v`.`user_id` = 5
        ";
        return $this->db->query($query)->getResultArray();
    }
}
