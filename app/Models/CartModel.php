<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function addUserCart()
    {
        $this->builder = $this->db->table('cart');
        $this->builder->set('user_id', user()->id);
        $this->builder->insert();
    }

    public function addItemToCart($data)
    {
        $this->builder = $this->db->table('cart_detail');
        $this->builder->insert($data);
    }

    public function getUserCart()
    {
        $this->builder = $this->db->table('cart');
        return $this->builder->getWhere(['user_id' => user()->id])->getRowArray();
    }

    public function getItemInUserCart($cart_id, $limit = NULL)
    {
        $this->builder = $this->db->table('cart_detail as cd');
        $this->builder->join('products as p', 'cd.product_id = p.id');
        $this->builder->join('vendors as v', 'p.vendor_id = v.id');
        $this->builder->orderBy('cd.created_at', 'DESC');
        $query =  $this->builder->getWhere(['cart_id' => $cart_id], $limit);
        return $query->getResultArray();
    }
}
