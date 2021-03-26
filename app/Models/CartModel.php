<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $allowedFields = ['vendor_id', 'name', 'description'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
}
