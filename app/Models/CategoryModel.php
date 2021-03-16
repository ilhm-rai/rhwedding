<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $allowedFields = ['vendor_id', 'name', 'description'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function getCategories()
    {
        $query = "SELECT `c`.*, COUNT(`pc`.`product_id`) AS amount
            FROM `category` AS `c`
            LEFT JOIN `products_category` AS `pc`
            ON `c`.`id` = `pc`.`category_id`
            GROUP BY `c`.`id`
            ORDER BY `c`.`id` ASC
        ";
            return $this->db->query($query)->getResultArray();
    }    
}
