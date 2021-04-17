<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $useTimestamps = true;
    protected $allowedFields = ['transaction_code', 'user_id ', 'total_pay', 'transaction_date', 'transaction_exp_date', 'payment_method', 'payment_date', 'payment_status', 'event_date'];
    protected $db;
    protected $VendorModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->VendorModel = new VendorModel();
    }

    // sesuai pemilik vendor
    public function getTransByUser($id)
    {
        $query = "SELECT `t`.`id`, `t`.`transaction_code`, `t`.`event_date`,COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`p`.`price`,0)) AS `subtotal`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        WHERE `v`.`user_id` = $id
        GROUP BY `t`.`transaction_code`
        ";
        return $this->db->query($query)->getResultArray();
    }
    public function getTransBy($code)
    {
        $query = "SELECT `t`.*, `up`.`full_name` AS `customer` , COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`p`.`price`,0)) AS `subtotal`
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
        $query = "SELECT `p`.`product_name`,`p`.`product_main_image`,`p`.`price`,`s`.`service_name` ,`td`.`id`,`td`.`note`,`td`.`confirm`
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

    // setiap pembeli
    public function getTransByBuyerId($id)
    {
        $query = "SELECT `t`.`id`, `t`.`transaction_code`,`t`.`total_pay`,`t`.`created_at`,COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`p`.`price`,0)) AS `subtotal`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        WHERE `t`.`user_id` = $id
        GROUP BY `t`.`transaction_code`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getMinPaymentDate()
    {
        $query = "SELECT min(`payment_date`) as `min_date`
        FROM `transaction` as `t`
        INNER JOIN `transaction_detail` as `td`
        ON `t`.id = `td`.`transaction_id`
        INNER JOIN `products` as `p`
        ON `p`.`id` = `td`.`product_id`
        WHERE `p`.`vendor_id` =
        " . $this->VendorModel->getMyVendorId();
        $result = $this->db->query($query)->getRow();
        return date('m/d/Y', strtotime($result->min_date));
    }

    public function getSoldProductBetweenDate($start_date, $end_date)
    {
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        $query = "SELECT `p`.`product_code`, `p`.`product_name`, `s`.`service_name`, `t`.`payment_date`, `p`.`price`
        FROM `transaction` as `t`
        INNER JOIN `transaction_detail` as `td`
        ON `t`.id = `td`.`transaction_id`
        INNER JOIN `products` as `p`
        ON `p`.`id` = `td`.`product_id`
        INNER JOIN `services` as `s`
        ON `s`.`id` = `p`.`product_service_id`
        WHERE `p`.`vendor_id` = " . $this->VendorModel->getMyVendorId() . " AND `t`.`payment_date` BETWEEN '$start_date' AND '$end_date'";

        return $this->db->query($query)->getResultArray();
    }

    public function getMyVendorTransaction()
    {
        $query = "SELECT t.transaction_code, SUM(p.price) as 'cash_in', COUNT(td.product_id) AS 'item_confirmed', t.event_date, t.payment_status
        FROM transaction as t
        INNER JOIN transaction_detail as td
        ON t.id = td.transaction_id
        INNER JOIN products as p
        ON p.id = td.product_id
        WHERE p.vendor_id = " . $this->VendorModel->getMyVendorId() . " AND td.confirm = 1
        GROUP BY t.transaction_code";

        return $this->db->query($query)->getResultArray();
    }
}
