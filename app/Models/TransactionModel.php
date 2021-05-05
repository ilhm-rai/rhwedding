<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $useTimestamps = true;
    protected $allowedFields = ['transaction_code', 'user_id ', 'total_pay', 'payment_method', 'payment_date', 'payment_status', 'event_date'];
    protected $db;
    protected $VendorModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->VendorModel = new VendorModel();
    }

    // sesuai pemilik vendor
    public function getAllTransaction()
    {
        $query = "SELECT `t`.`transaction_code`, `t`.`event_date`, COUNT(`td`.`id`) AS amount, IF(`t`.`payment_status` > 0, 'Paid', 'Unpaid') as `payment_status`, SUM(IF(`td`.`confirm` = 1, `p`.`price`, 0)) AS `invoice`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` AS `p`
        ON `p`.`id` = `td`.`product_id`
        GROUP BY `t`.`transaction_code`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getTransBy($code)
    {
        $query = "SELECT `t`.*, `up`.`full_name` AS `customer` , COUNT(`td`.`id`) AS amount, SUM(IF(`td`.`confirm` = 1,`p`.`price`,0)) AS `cash_in`
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

    public function getTransDetailBy($code)
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
        WHERE `t`.`transaction_code` = '$code'
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
        $query = "SELECT t.transaction_code, SUM(IF(td.confirm = 1, p.price,0)) as 'cash_in',COUNT(td.product_id) AS 'amount_item', COUNT(IF(td.confirm = 1,td.product_id,null)) AS 'item_confirmed', t.event_date, t.payment_status
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        WHERE `t`.`user_id` = $id AND `t`.`payment_status` = 0
        GROUP BY `t`.`transaction_code`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getHistoryTransByBuyerId($id)
    {
        $query = "SELECT p.*
        FROM `transaction` AS `t`
        JOIN `payment` AS `p`
        ON `t`.`transaction_code` = `p`.`order_id`
        WHERE `t`.`user_id` = $id
        ORDER By `p`.`id` DESC
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getMinPaymentDate($isMyVendor = false)
    {
        $query = "SELECT min(`payment_date`) as `min_date`
        FROM `transaction` as `t`
        INNER JOIN `transaction_detail` as `td`
        ON `t`.id = `td`.`transaction_id`
        INNER JOIN `products` as `p`
        ON `p`.`id` = `td`.`product_id`";

        if ($isMyVendor == true) {
            $query .= " WHERE `p`.`vendor_id` = " . $this->VendorModel->getMyVendorId();
        }

        $result = $this->db->query($query)->getRow();
        return date('m/d/Y', strtotime($result->min_date));
    }

    public function getSoldProductBetweenDate($start_date, $end_date)
    {
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        $query = "SELECT `p`.`product_code`, `p`.`product_name`, `s`.`service_name`, `t`.`payment_date`, `p`.`price`, `p`.`vendor_id`
        FROM `transaction` as `t`
        INNER JOIN `transaction_detail` as `td`
        ON `t`.id = `td`.`transaction_id`
        INNER JOIN `products` as `p`
        ON `p`.`id` = `td`.`product_id`
        INNER JOIN `services` as `s`
        ON `s`.`id` = `p`.`product_service_id`
        WHERE `td`.`confirm` = '1' AND `t`.`payment_date` BETWEEN '$start_date' AND '$end_date'";

        return $this->db->query($query)->getResultArray();
    }

    public function getMyVendorSoldProductBetweenDate($start_date, $end_date)
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
        WHERE `p`.`vendor_id` = " . $this->VendorModel->getMyVendorId() . " AND `td`.`confirm` = '1' AND `t`.`payment_date` BETWEEN '$start_date' AND '$end_date'";

        return $this->db->query($query)->getResultArray();
    }

    public function getMyVendorTransaction()
    {
        $query = "SELECT t.transaction_code, SUM(IF(td.confirm = 1, p.price,0)) as 'cash_in',COUNT(td.product_id) AS 'amount_item', COUNT(IF(td.confirm = 1,td.product_id,null)) AS 'item_confirmed', t.event_date, t.payment_status
        FROM transaction as t
        INNER JOIN transaction_detail as td
        ON t.id = td.transaction_id
        INNER JOIN products as p
        ON p.id = td.product_id
        WHERE p.vendor_id = " . $this->VendorModel->getMyVendorId() . "
        GROUP BY t.transaction_code
        ORDER By t.id DESC";

        return $this->db->query($query)->getResultArray();
    }

    public function getVendorInTransactionBetweenDate($start_date, $end_date)
    {
        $query = "SELECT `v`.`id`, `v`.`vendor_name`
        FROM `transaction` AS `t`
        JOIN `transaction_detail` AS `td`
        ON `t`.`id` = `td`.`transaction_id`
        JOIN `products` As `p`
        ON `td`.`product_id` = `p`.`id`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        WHERE `t`.`payment_status` = '1'
        GROUP BY `v`.`id`
        ";
        return $this->db->query($query)->getResultArray();
    }

    public function getEarnings()
    {
        $sql =  "SELECT sum(total_pay) as earnings FROM transaction WHERE payment_status=1";
        return $this->db->query($sql)->getRowArray();
    }

    public function getVendorEarnings($vendor_id)
    {
        $sql =  "SELECT sum(p.price) as earnings FROM transaction as t INNER JOIN transaction_detail as td ON td.transaction_id = t.id INNER JOIN products as p ON p.id = td.product_id WHERE p.vendor_id=$vendor_id AND t.payment_status=1 ";
        $query = $this->db->query($sql)->getRowArray();
        return $query['earnings'];
    }
}
