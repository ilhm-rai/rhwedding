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
}
