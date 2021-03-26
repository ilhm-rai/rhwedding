<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = ['vendor_id', 'product_service_id', 'slug', 'product_name', 'product_main_image', 'product_description', 'price', 'stock'];
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
    public function getProductBySlug($slug)
    {
        $query = "SELECT `p`.*, `s`.`name` as `service`
        FROM `products` AS `p`
        JOIN `vendors` AS `v`
        ON `p`.`vendor_id` = `v`.`id`
        JOIN `vendors_services` AS `vs`
        ON `p`.`product_service_id` = `vs`.`id`
        JOIN `services` AS `s`
        ON `vs`.`service_id` = `s`.`id`
        WHERE `p`.`slug` = '$slug'
    ";
        return $this->db->query($query)->getRowArray();
    }

    // make product code
    public function createProductCode($vendor_id)
    {
        $query = "SELECT RIGHT(`products`.`id`,1) AS `id`
                FROM `products`
                ORDER BY `id` DESC
                LIMIT 1
        ";
        $result = $this->db->query($query)->getRowArray();
        // dd($result);
        if ($result > 0) {
            $uniq = $result['id']  + 1;
        }

        $date = date('Ym');
        $limit = str_pad($uniq, 3, "0", STR_PAD_LEFT);
        $code_prod = "PRD" . $vendor_id . $date . $limit;  //format kode
        return $code_prod;
    }

    public function getProductsByService()
    {
        $query = "SELECT `p`.`product_name`, `p`.`product_main_image`, `p`.`price`, `p`.`slug`, `s`.`name` as `service_name`, `s`.`id` as `service_id`
        FROM `products` as `p`
        INNER JOIN `vendors_services` AS `vs`
        ON `p`.`product_service_id` = `vs`.`id`
        INNER JOIN `services` AS`s`
        ON `vs`.`service_id` = `s`.`id`
    ";
        return $this->db->query($query)->getResultArray();
    }

    public function getProductsSuggest($keyword)
    {
        $query = "SELECT product_name, product_main_image
        FROM `products` AS `p`
        WHERE `product_name` LIKE '$keyword%'
        LIMIT 2
    ";
        return $this->db->query($query)->getResultArray();
    }

    public function getProductsByKeyword($keyword)
    {
        $query = "SELECT product_name, product_main_image
        FROM `products` AS `p`
        WHERE `product_name` LIKE '$keyword%'
    ";
        return $this->db->query($query)->getResultArray();
    }
}
