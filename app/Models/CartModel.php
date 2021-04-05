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

    public function getUserCart($select = "*")
    {
        $this->builder = $this->db->table('cart');
        $this->builder->select($select);
        return $this->builder->getWhere(['user_id' => user()->id])->getRowArray();
    }

    public function getItemInUserCart($where = "")
    {
        $cart_id = $this->getUserCart('id');
        $this->builder = $this->db->table('cart_detail as cd');
        $this->builder->select('cd.id as cart_detail_id, p.id as product_id, v.id as vendor_id, p.product_name, p.price, v.vendor_name, s.service_name, p.product_main_image, cd.process_into_transaction');
        $this->builder->join('products as p', 'p.id = cd.product_id');
        $this->builder->join('vendors as v', 'v.id = p.vendor_id');
        $this->builder->join('services as s', 's.id = p.product_service_id');
        $this->builder->orderBy('cd.created_at', 'DESC');
        $query =  $this->builder->getWhere(['cart_id' => $cart_id, $where]);
        return $query->getResultArray();
    }

    public function getItemInUserCartLimit($limit)
    {
        $cart_id = $this->getUserCart('id');
        $this->builder = $this->db->table('cart_detail as cd');
        $this->builder->join('products as p', 'p.id = cd.product_id');
        $this->builder->join('vendors as v', 'v.id = p.vendor_id');
        $this->builder->join('services as s', 's.id = p.product_service_id');
        $this->builder->orderBy('cd.created_at', 'DESC');
        $query =  $this->builder->getWhere([], $limit);
        return $query->getResultArray();
    }

    public function isItemInCart($product_id)
    {
        $cart_id = $this->getUserCart('id');

        $this->builder = $this->db->table('cart_detail as cd');
        $query = $this->builder->getWhere(['cart_id' => $cart_id, 'product_id' => $product_id]);
        if ($query->getResultArray()) {
            return true;
        }

        return false;
    }

    public function getVendorInCart()
    {
        $cart = $this->getUserCart('id');

        $this->builder = $this->db->table('cart_detail as cd');
        $this->builder->select('v.vendor_name, vendor_id');
        $this->builder->join('products as p', 'cd.product_id = p.id');
        $this->builder->join('vendors as v', 'p.vendor_id = v.id');
        $this->builder->groupBy('v.vendor_name');
        $this->builder->orderBy('cd.created_at', 'DESC');
        $query =  $this->builder->getWhere(['cart_id' => $cart]);
        return $query->getResultArray();
    }

    public function getItemGroupByVendor()
    {
        $vendors = $this->getVendorInCart();

        foreach ($vendors as $vendor) {
            $data[] = $this->getItemInUserCart("vendor_id => $vendor[vendor_id]");
        }

        return $data;
    }

    public function deleteItemInCart($product_id)
    {
        $cart_id = $this->getUserCart('id');

        $this->builder = $this->db->table('cart_detail');
        return $this->builder->delete(['cart_id' => $cart_id, 'product_id' => $product_id]);
    }
}
