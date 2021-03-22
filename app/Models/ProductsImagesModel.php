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
      
}
