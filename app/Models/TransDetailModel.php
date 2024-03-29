<?php

namespace App\Models;

use CodeIgniter\Model;

class TransDetailModel extends Model
{
    protected $table = 'transaction_detail';
    protected $allowedFields = ['transaction_id','product_id','note','sub_total_payment','confirm','reason_reject'];


    public function getDetailTransBy($id)
    {
        $query = "SELECT `td`.*, `p`.`product_name`
        FROM `transaction_detail` AS `td`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        WHERE `td`.`id` = $id
        ";
        return $this->db->query($query)->getRowArray();
    }

    public function getDetailByTransCode($code)
    {
        $query = "SELECT `td`.*, `p`.`product_name`, `p`.`product_main_image`,`p`.`price`,`s`.`service_name`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` AS `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `services` AS `s`
        ON `p`.`product_service_id` = `s`.`id`
        WHERE `t`.`transaction_code` = '$code'
        ";
         return $this->db->query($query)->getResultArray();
    }

    public function getMyCustomer($vendor_id)
    {
        $sql = "SELECT count(DISTINCT t.user_id) as customers FROM transaction as t INNER JOIN transaction_detail as td ON td.transaction_id = t.id INNER JOIN products as p ON p.id = td.product_id WHERE p.vendor_id = $vendor_id";
        return $this->db->query($sql)->getRowArray();
    }
}
