<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsImagesModel extends Model
{
    protected $table = 'products_images';
    protected $allowedFields = ['product_id', 'image'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getImagesByProduct($id)
    {
        $query = "SELECT `pi`.*
        FROM `products_images` AS `pi`
        JOIN `products` AS `p`
        ON `p`.`id` = `pi`.`product_id`
        WHERE `p`.`id` = $id
    ";
        return $this->db->query($query)->getResultArray();
    }
    public function getImagesByProductCode($code)
    {
        $query = "SELECT `pi`.*
        FROM `products_images` AS `pi`
        JOIN `products` AS `p`
        ON `p`.`id` = `pi`.`product_id`
        WHERE `p`.`product_code` = '$code'
    ";
        return $this->db->query($query)->getResultArray();
    }
      
}
