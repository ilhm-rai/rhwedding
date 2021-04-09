<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $allowedFields = ['transaction_code', 'user_id ', 'total_pay', 'transaction_date', 'transaction_exp_date', 'payment_method', 'payment_date', 'payment_status', 'event_date'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getTransByUser($id)
    {
        $query = "SELECT `t`.*, COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`td`.`sub_total_payment`,0)) AS `payment`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        WHERE `v`.`user_id` = $id
        ";
        return $this->db->query($query)->getResultArray();
    }
    public function getTransBy($code)
    {
        $query = "SELECT `t`.*, `up`.`full_name` AS `customer` , COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`td`.`sub_total_payment`,0)) AS `payment`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        JOIN `users` AS `u`
        ON `t`. `user_id` = `u`. `id`
        JOIN `users_profile` AS `up`
        ON `up`.`user_id` = `u`.`id`
        WHERE `t`.`transaction_code` = '$code'
        ";
        return $this->db->query($query)->getRowArray();
    }
    public function getTransDetailBy($userId, $code)
    {
        $query = "SELECT `p`.`product_name`,`p`.`product_main_image`,`s`.`service_name` ,`td`.`id`,`td`.`note`,`td`.`sub_total_payment`,`td`.`confirm`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        JOIN `services` AS `s`
        ON `p`.`product_service_id` = `s`.id
        WHERE `v`.`user_id` = $userId
        AND `t`.`transaction_code` = '$code'
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function insertTransaction(array $data)
    {
        $this->builder = $this->db->table('transaction');
        $this->builder->insert($data);
    }

    public function insertTransactionDetail(array $items)
    {
        $this->builder = $this->db->table('transaction_detail');
        return $this->builder->insertBatch($items);
    }

    public function getIdTransactionByCode($transactionCode)
    {
        $this->builder = $this->db->table('transaction');
        $this->builder->select('id');
        $query = $this->builder->getWhere(['transaction_code' => $transactionCode]);
        $row = $query->getRowArray();
        return $row['id'];
    }
}
