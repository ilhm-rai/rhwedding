<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $useTimestamps = true;
    protected $db;


    public function getProducts()
    {
            $query = "SELECT `p`.*, `s`.`name` as `service` 
            FROM `products` AS `p`
            JOIN `vendors` AS `v`
            ON `p`.`vendor_id` = `v`.`id`
            JOIN `vendors_service` AS `vs`
            ON `p`.`product_service_id` = `vs`.`id`
        "; 
        return $this->db->query($query)->getResultArray();
    }
    
    public function getProductsByUser($id)
    {
        $query = "SELECT `p`.*, `s`.`name` as `service` 
        FROM `products` AS `p`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        JOIN `vendors_services` AS `vs`
        ON `p`.`product_service_id` = `vs`.`id`
        JOIN `services` AS `s`
        ON `vs`.`service_id` = `s`.`id`
        WHERE `v`.`user_id` = $id
    "; 
        return $this->db->query($query)->getResultArray();
    }
    public function getProductBy($id)
    {
        $query = "SELECT `p`.*, `s`.`name` as `service` 
        FROM `products` AS `p`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        JOIN `vendors_services` AS `vs`
        ON `p`.`product_service_id` = `vs`.`id`
        JOIN `services` AS `s`
        ON `vs`.`service_id` = `s`.`id`
        WHERE `p`.`id` = $id
    "; 
        return $this->db->query($query)->getRowArray();
    }

}